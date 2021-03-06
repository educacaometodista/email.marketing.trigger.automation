<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDeAcaoDaInstituicao extends Model
{
    public $table = 'tipos_de_acoes_das_instituicoes';

    public $fillable = [
        'nome',
        'tipo_de_acao_id',
        'instituicao_id',
        'filtro_id',
        'mensagem_id',
        'nome_da_lista_de_contatos',
        'nome_do_arquivo'
    ];

    public function getNomeDaListaDeContatos(array $dados)
    {
        return CampoVariavel::getCampo($this->nome_da_lista_de_contatos, $dados);
    }

    public function tipo_de_acao()
    {
        return $this->belongsTo(TipoDeAcao::class, 'tipo_de_acao_id');
    }

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'instituicao_id', 'id');
    }

    public function filtro()
    {
        return $this->belongsTo(Filtro::class, 'filtro_id');
    }

    public function mensagem()
    {
        return $this->belongsTo(Mensagem::class, 'mensagem_id');
    }
}
