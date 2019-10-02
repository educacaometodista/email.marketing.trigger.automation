<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    public $table = 'listas';

    public $fillable = [
        'nome_da_lista',
        'nome_do_arquivo',
        'contatos',
        'conteudo',
        'filtro_id'
    ];
}
