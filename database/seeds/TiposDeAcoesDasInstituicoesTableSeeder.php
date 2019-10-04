<?php

use Illuminate\Database\Seeder;

class TiposDeAcoesDasInstituicoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 1;
        $tipo_de_acao_da_instituicao->instituicao_id = 1;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 1;
        $tipo_de_acao_da_instituicao->save();

    }
}
