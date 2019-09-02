<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $guard = 'instituicoes';

    protected $fillable = [
        'nome',
        'codigo_da_empresa',
    ];
}
