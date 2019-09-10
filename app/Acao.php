<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acao extends Model
{
    public $table = 'acoes';

    public $fillable = [
        'titulo',
        'envio',
        'destinatarios',
        'status',
        'mensagem_id'
    ];
}
