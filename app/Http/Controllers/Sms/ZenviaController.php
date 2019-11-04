<?php

namespace App\Http\Controllers\Sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ZenviaController extends Controller
{
    public $headers = [];

    public function setHeaders()
    {
        $credentials = include 'credentials.php';
        $this->$headers['Authorization'] = 'Basic '.base64_encode($credentials['conta'].':'.$credentials['senha']);
        $this->$headers['Content-Type'] = 'application/json';
        $this->$headers['Accept'] = 'application/json';
    }
}
