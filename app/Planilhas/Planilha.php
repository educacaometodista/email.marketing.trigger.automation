<?php

namespace App\Planilhas;

use Illuminate\Database\Eloquent\Model;

class Planilha extends Model
{
    protected $table = 'planilhas';

    protected $fillable = [
        'nome',
        'ddd',
        'email',
        'celular',
        'instituicao',
        'documento',
    ];

}
