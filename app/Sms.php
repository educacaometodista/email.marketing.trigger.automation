<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    public $table = 'smss';

    public $fillable = [
        'remetente',
        'destinatario',
        'horario',
        'msg',
    ];
}
