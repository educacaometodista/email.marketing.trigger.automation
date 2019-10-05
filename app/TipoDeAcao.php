<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDeAcao extends Model
{
    public $table = 'tipos_de_acoes';

    public $fillable = [
        'nome',
        'nome_de_exibicao'
    ];

    public function tipo_de_acao_das_instituicoes()
    {
        return $this->hasOne(TipoDeAcaoDaInstituicao::class, 'tipo_de_acao_id', 'id');
    }
}
