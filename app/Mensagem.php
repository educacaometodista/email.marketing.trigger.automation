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
        return (isset($_SERVER['HTTPS']) ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].'/mensagens/'.strtolower($this->instituicao->prefixo).'/'.$this->nome_do_arquivo.'.html';
    }

    public static function editFile($file_name, $new_content, $instituicao_prefixo)
    {
        file_put_contents(public_path("mensagens/".strtolower($instituicao_prefixo)."/$file_name.html"), $new_content);
    }
}
