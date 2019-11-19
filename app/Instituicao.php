<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    public $table = 'instituicoes';

    public $fillable = [
        'nome',
        'prefixo',
        'codigo_da_empresa',
        'remetente_do_email',
        'remetente_do_sms',
        'email_do_remetente',
        'email_de_retorno',
    ];

    public function tipos_de_acoes_da_instituicao()
    {
        //return $this->hasOne(TipoDeAcaoDaInstituicao::class, 'instituicao_id', 'id');
        return $this->hasMany(TipoDeAcaoDaInstituicao::class, 'instituicao_id');
    }
}
