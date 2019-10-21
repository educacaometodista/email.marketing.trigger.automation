<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    public $table = 'processos';

    public $fillable = [
        'identificador',
        'progresso'
    ];

}
