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
    ];

    public function getUrl()
    {
        return (isset($_SERVER['HTTPS']) ? 'https://' : 'http://').$_SERVER['HTTP_HOST'].'/mensagens/'.strtolower($this->tipo_de_acao_da_instituicao->instituicao_id).'/'.$this->nome_do_arquivo.'.html';
    }

    public static function editFileContent($file_name, $new_content, $instituicao_prefixo)
    {
        file_put_contents(public_path("mensagens/".strtolower($instituicao_prefixo)."/$file_name.html"), $new_content);
    }

    public static function alterarCampoVariavel($file_name, $campo_variavel, $valor)
    {
        $file_content = file_get_content(public_path("mensagens/$file_name.html"));
        $new_content = str_replace($campo_variavel, $valor, $file_content);
        file_put_contents($file_name, $new_content);
    }

    public static function renameFile($file_name, $new_file_name, $instituicao_prefixo)
    {
        rename(public_path("mensagens/".strtolower($instituicao_prefixo)."/$file_name.html"), public_path("mensagens/".strtolower($instituicao_prefixo)."/$new_file_name.html"));
    }

    public static function createFile($file_name, $content ,$instituicao_prefixo)
    {
        file_put_contents(public_path("mensagens/".strtolower($instituicao_prefixo)."/$file_name.html"), $content);
    }

    public static function deleteFile($file_name, $instituicao_prefixo)
    {
        unlink(public_path("mensagens/".strtolower($instituicao_prefixo)."/$file_name.html"));
    }

    public function tipo_de_acao_da_instituicao()
    {
        return $this->hasOne(TipoDeAcaoDaInstituicao::class, 'mensagem_id', 'id');
    }
    
}
