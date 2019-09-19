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
        'agendamento',
        'usuario_id',
        'mensagem_id'
    ];

    public function usuario()
    {
        return $this->hasOne(Admin::class, 'usuario_id');
    }

    public function mensagem()
    {
        return $this->hasOne(Mensagem::class, 'mensagem_id');
    }
}
