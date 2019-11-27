<?php

namespace App\Http\Controllers\Sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\DB;
use Session;
use App\Sms;

class ZenviaController extends Controller
{
    public $headers = [];

    public $sms = [
        'from' => '',
        'to' => '',
        'schedule' => '',
        'msg' => '',
        'callbackOption' => 'NONE',
        'id' => '',
        'flashSms' => false
    ];

    public $statusCode = [
        '00' => 'OK',
        '01' => 'Programado',
        '02' => 'Enviado',
        '03' => 'Entregue',
        '04' => 'Não recebido',
        '05' => 'Bloqueado - sem cobertura',
        '06' => 'Bloqueado - black listed',
        '07' => 'Bloqueado - número inválido',
        '08' => 'Bloqueado - conteúdo não permitido | mensagem expirada',
        '09' => 'Bloqueado',
        '10' => 'Erro'
    ];

    public $detailCode = [
        '000' => 'Mensagem enviada',
        '002' => 'Mensagem cancelada com sucesso',
        '010' => 'Conteúdo da mensagem vazia',
        '011' => 'Corpo da mensagem inválido',
        '012' => 'Estouro de conteúdo da mensagem',
        '013' => 'Número de celular incorreto ou incompleto "para"',
        '014' => 'Número de celular "para" vazio',
        '015' => 'Data de agendamento inválida ou incorreta',
        '016' => 'ID em excesso',
        '017' => 'O parâmetro "url" é inválido ou incorreto',
        '018' => 'Campo "de" inválido',
        '021' => 'Campo "id" obrigatório',
        '080' => 'Mensagem com o mesmo ID já enviada',
        '100' => 'Mensagem na fila',
        '110' => 'Mensagem enviada ao operador',
        '111' => 'Confirmação de mensagem indisponível',
        '120' => 'Mensagem recebida pelo celula',
        '130' => 'Mensagem bloqueada',
        '131' => 'Mensagem bloqueada pela limpeza preditiva',
        '132' => 'Mensagem já cancelada',
        '133' => 'Conteúdo da mensagem na análise',
        '134' => 'Mensagem bloqueada por conteúdo proibido',
        '135' => 'O agregado é inválido ou inativo',
        '136' => 'Mensagem expirada',
        '140' => 'Número de celular não coberto',
        '141' => 'Envio internacional não permitido',
        '145' => 'Número de celular inativo',
        '150' => 'Mensagem expirada no operador',
        '160' => 'Erro de rede do operador',
        '161' => 'Mensagem rejeitada pelo operador',
        '162' => 'Mensagem cancelada ou bloqueada pelo operador',
        '170' => 'Mensagem incorreta',
        '171' => 'Número incorreto',
        '172' => 'Parâmetro ausente',
        '180' => 'ID da mensagem não encontrado',
        '190' => 'Erro desconhecido',
        '200' => 'Mensagens enviadas',
        '210' => 'Mensagens agendadas, mas o limite da conta foi atingido',
        '240' => 'Arquivo vazio ou não enviado',
        '241' => 'Arquivo muito grande',
        '242' => 'File readerror',
        '300' => 'Mensagens recebidas encontradas',
        '301' => 'Nenhuma mensagem recebida encontrada',
        '400' => 'Entidade salva',
        '900' => 'Erro de autenticação',
        '901' => 'O tipo de conta não suporta esta operação',
        '990' => 'Limite de conta atingido - entre em contato com o suporte',
        '998' => 'Operação incorreta solicitada',
        '999' => 'Erro desconhecido'
    ];

    public $requestList;

    public function __construct()
    {
        $this->setHeaders();
    }

    public function setHeaders()
    {
        $credentials = include 'credentials.php';
        $this->headers['Authorization'] = 'Basic '.base64_encode($credentials['conta'].':'.$credentials['senha']);
        $this->headers['Content-Type'] = 'application/json';
        $this->headers['Accept'] = 'application/json';
    }

    public function sendMulti($number_list, $from, $schedule, $msg, $nome_da_instituicao)
    {        
        if(is_null($number_list) || count($number_list) == 0)
        {
            return [
                'status' => 'danger',
                'message' => 'Não há números de celulares para enviar SMS em '.$nome_da_instituicao
            ];

        } else {

            $requestList = [];
            $sms = null;
            $this->sms['from'] = $from;
            $this->sms['schedule'] = $schedule;
            $this->sms['msg'] = $msg;

            $last_sms = DB::table('smss')->orderBy('id', 'DESC')->first();
            $last_sms_id = is_null($last_sms) ? '0' : $last_sms->id;
            $usedIds = [];

            foreach($number_list as $number)
            {
                $sms = $this->sms;
                $sms['id'] = 'ZENVIA_ID_'.(++$last_sms_id);
                $sms['to'] = '55'.$number;
                array_push($requestList, $sms);
                array_push($usedIds, 'ZENVIA_ID_'.$last_sms_id);
            }

            $body = [
                "sendSmsMultiRequest" => [
                    "aggregateId" => 1231,
                    "sendSmsRequestList" => $requestList 
                ]
            ];

            

            $response = $this->post('https://api-rest.zenvia.com/services/send-sms-multiple', $body);
            $response = json_decode(json_encode($response), true);
            $statusCode = $response['content']['sendSmsMultiResponse']['sendSmsResponseList'][0]['statusCode'];
            $detailCode = $response['content']['sendSmsMultiResponse']['sendSmsResponseList'][0]['detailCode'];
            $status_class = $statusCode == '04' || $statusCode == '05' || $statusCode == '06' || $statusCode == '07' || $statusCode == '08'  || $statusCode == '09'  || $statusCode == '10' ? 'danger' : 'success';

            $this->saveUsedIds($usedIds);

            return [
                'status' => $status_class,
                'message' => $this->statusCode[$statusCode].'. '.$this->detailCode[$detailCode].' em "'.$nome_da_instituicao.'"'
            ];

        }
    }

    public function saveUsedIds($usedIds)
    {
        $sms = null;
        foreach($usedIds as $zenvia_id)
        {
            $sms = new Sms;
            $sms->zenvia_id = $zenvia_id;
            $sms->save();
        }
    }

    public function post($endPoint, $body)
    {
        $response = Curl::to($endPoint)
            ->withHeaders($this->headers)
            ->withResponseHeaders()
            ->withData($body)
            ->asJson()
            ->returnResponseObject()
            ->post();
        
        return $response;
    }

}


