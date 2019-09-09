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
        'nome_do_remetente',
        'email_do_remetente',
        'email_de_retorno',
        'mensagem_id'
    ];
}
