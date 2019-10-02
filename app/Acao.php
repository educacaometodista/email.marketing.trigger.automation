<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acao extends Model
{
    public $table = 'acoes';

    public $fillable = [
        'titulo',
        'destinatarios',
        'status',
        'agendamento',
        'usuario_id',
        'tipo_de_acao_da_instituicao_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(Admin::class, 'usuario_id');
    }

    public function tipo_de_acao_da_instituicao()
    {
        return $this->belongsTo(TipoDeAcaoDaInstituicao::class, 'tipo_de_acao_da_instituicao_id');
    }
}
