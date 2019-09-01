<?php

namespace App\Planilhas;

use Illuminate\Database\Eloquent\Model;

class Planilha extends Model
{
    protected $guard = 'planilhas';

    protected $fillable = [
        'nome',
        'email',
        'celular',
        'instituicao',
        'documento',
    ];

}
