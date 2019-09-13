<?php

namespace App\Http\Controllers\Emkt;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ixudra\Curl\Facades\Curl;

class AknaController extends Controller
{
    public $endPoint = 'http://app.akna.com.br/emkt/int/integracao.php';

    public $storagePath = '';

    public $data;

    public $codigosIes;

    public function __construct()
    {
        $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $host = $_SERVER['HTTP_HOST'];
        $this->fileStorage = $protocol.$host."/akna_lists/";
        $this->xmlPath = storage_path().'/akna_xml';
        $this->data = include __DIR__.'/user.php';
    }

    public function getXml($file)
    {
        return file_get_contents($this->xmlPath.'/'.$file.'.xml');
    }

    public function post($headers=[], $xml)
    {
        $data = $this->data;
        $data['XML'] = $xml;

        return $response = Curl::to($this->endPoint)
            ->withData($data)
            ->withHeaders($headers)
            ->post();
    }
    /* Listas */
    public function importarListaDeContatos($nome_da_lista, $nome_do_arquivo, $instituicao, $codigo_da_empresa) 
    {
       
        $this->data['Client'] = $codigo_da_empresa;
        $url_do_arquivo = $this->fileStorage.$nome_do_arquivo;

        $xml_request = $this->getXml('listas/importar-lista-de-contatos');
        $xml_request = str_replace('[NOME DA LISTA]', $nome_da_lista, $xml_request);
        $xml_request = str_replace('[URL DO ARQUIVO]', $url_do_arquivo, $xml_request);
        $xml_request = str_replace('[NUMERO DA COLUNA EMAIL]', '2', $xml_request);

        // Separador (',', ';')
        $xml_request = str_replace('[SEPARADOR]', ';', $xml_request);

        // I = Adicionar o conteúdo do arquivo ao conteúdo da lista
        // S = Remover o conteúdo anterior da lista antes de importar
        // R = Excluir da lista os contatos importados do arquivo
        $xml_request = str_replace('[ACAO]', 'I', $xml_request);

        // S/N - Informe se o seu arquivo importado possui ou não a linha de cabeçalho
        $xml_request = str_replace('[CABECALHO]', 'S', $xml_request);

        // S/N - • Atualizar - Atualizar os dados dos contatos que estiverem diferentes.
        $xml_request = str_replace('[ATUALIZAR]', 'S', $xml_request);

        //dd($xml_request);

        $xml_response = $this->post([], $xml_request);

        $xml = new \SimpleXMLElement($xml_response);
        $codigo_do_processo = $xml->EMKT->PROCESSO[0];

        return $this->consultarSituacaoDoProcesso($codigo_do_processo, $instituicao, $codigo_da_empresa);

    }

    public function consultarSituacaoDoProcesso($codigo_do_processo, $instituicao, $codigo_da_empresa)
    {
        $this->data['Client'] = $codigo_da_empresa;

        $xml_request = $this->getXml('listas/consultar-situacao-de-processo-de-importacao');
        $xml_request = str_replace('[CODIGO DO PROCESSO]', $codigo_do_processo, $xml_request);

        $xml_response = $this->post([], $xml_request);
        
        $xml = new \SimpleXMLElement($xml_response);
        
        if($xml->EMKT->MENSAGEM)
        {
            return 'Lista importada com sucesso em '.$instituicao.'!';

        } elseif ($xml->FUNC->RETURN[0]) {
            
            return $xml->FUNC->RETURN[0].' em '.$instituicao.'!';

        }

    }

    /* Ações */
    public function criarAcaoPontual($titulo_da_acao, $mensagem, $agendamento_envio, $instituicao, $nomes_das_listas)
    {
        $this->data['Client'] = $instituicao->codigo_da_empresa;

        $xml_request = $this->getXml('acoes/criar-acao-pontual');
        $xml_request = str_replace('[TITULO DA ACAO]', $titulo_da_acao, $xml_request);
        $xml_request = str_replace('[E-MAIL USUARIO]', $this->data['User'], $xml_request);
        $xml_request = str_replace('[AGENDAMENTO]', $agendamento_envio, $xml_request);
        $xml_request = str_replace('[DATA ENCERRAMENTO]', '2019-10-10', $xml_request);
        $xml_request = str_replace('[NOME DO REMETENTE]', $instituicao->nome_do_remetente, $xml_request);
        $xml_request = str_replace('[EMAIL DO REMETENTE]', $instituicao->email_do_remetente, $xml_request);
        $xml_request = str_replace('[EMAIL PARA RETORNO]', $instituicao->email_de_retorno, $xml_request);
        $xml_request = str_replace('[LINK DA MENSAGEM]', $mensagem->url, $xml_request);
        $xml_request = str_replace('[ASSUNTO]', $mensagem->assunto, $xml_request);
        
        if(is_array($nomes_das_listas) && count($nomes_das_listas) > 0)
            $xml_request = str_replace('[NOMES DAS LISTAS]', '<lista>'.$nomes_das_listas[$instituicao->prefixo].'</lista>', $xml_request);
        else
            $xml_request = str_replace('[NOMES DAS LISTAS]', '', $xml_request);

        $xml_response = $this->post([], $xml_request);

        $xml = new \SimpleXMLElement($xml_response);

        return str_replace('.', '!', $xml->EMKT->RETURN[0]);
    }
}
