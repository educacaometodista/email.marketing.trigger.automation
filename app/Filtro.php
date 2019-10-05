<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filtro extends Model
{
    public $table = 'filtros';

    public $fillable = [
        'nome',
        'regra'
    ];

    public function tipos_de_acoes_das_instituicoes()
    {
        return $this->hasOne(TipoDeAcaoDaInstituicao::class, 'filtro_id', 'id');
    }
}
