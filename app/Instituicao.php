<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $table = 'instituicoes';

    protected $fillable = [
        'nome',
        'prefixo',
        'codigo_da_empresa',
        'nome_do_remetente',
        'email_do_remetente',
        'email_de_retorno',
    ];
}
