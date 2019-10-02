<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filtro extends Model
{
    public $table = 'filtros';

    public $fillable = [
        'regra'
    ];
}
