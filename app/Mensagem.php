<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    public $table = 'mensagens';

    public $fillable = [
        'titulo',
        'nome_do_arquivo',
        'conteudo',
        'assunto',
        'tipo_de_acao',
        'instituicao_id',
    ];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'instituicao_id');
    }

    public function acao()
    {
        return $this->hasOne(Acao::class);
    }

    public function getUrl()
    {
        return (isset($_SERVER['HTTPS']) ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].'/mensagens/'.strtolower($this->prefixo).'/'.$this->nome_do_arquivo.'.html';
    }
}
