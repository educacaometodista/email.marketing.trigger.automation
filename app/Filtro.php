<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filtro extends Model
{
    public $table = 'filtros';

    public $fillable = [
        'regra'
    ];

    public function tipos_de_acoes_das_instituicoes()
    {
        return $this->belongsToMany(TipoDeAcaoDaInstituicao::class);
    }
}
