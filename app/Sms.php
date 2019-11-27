<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    public $table = 'smss';

    public $fillable = [
        'zenvia_id',
    ];
}
