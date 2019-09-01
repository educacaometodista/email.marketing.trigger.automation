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
        $host = gethostname();
        $this->storagePath = "$host/akna_lists/";
        $this->xmlPath = storage_path().'/akna_xml';
        $this->data = include __DIR__.'/user.php';
        $this->codigosIes = include __DIR__.'/client-codes.php';
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

    public function importarListaDeContatos($nome_da_lista, $nome_do_arquivo, $instituicao) 
    {
        $codigoIe = $this->codigosIes[strtoupper($instituicao)];
        $this->data['Client'] = $codigoIe;

        $url_do_arquivo = $this->storagePath.$nome_do_arquivo;

        $xml = $this->getXml('listas/importar-lista-de-contatos');
        $xml = str_replace('[NOME DA LISTA]', $nome_da_lista, $xml);
        $xml = str_replace('[URL DO ARQUIVO]', $url_do_arquivo, $xml);
        $xml = str_replace('[NUMERO DA COLUNA EMAIL]', '2', $xml);

        return $this->post([], $xml);
    }

}
