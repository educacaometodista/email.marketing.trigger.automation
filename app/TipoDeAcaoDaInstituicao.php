<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDeAcaoDaInstituicao extends Model
{
    public $table = 'tipos_de_acoes_das_instituicoes';

    public $fillable = [
        'tipo_de_acao_id',
        'instituicao_id',
        'filtro_id',
        'mensagem_id'
    ];
}
