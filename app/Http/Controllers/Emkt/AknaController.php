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
        $this->storagePath = storage_path().'/akna_xml';
        $this->data = include __DIR__.'/config/user.php';
        $this->codigosIes = include __DIR__.'/config/client-codes.php';
    }

}
