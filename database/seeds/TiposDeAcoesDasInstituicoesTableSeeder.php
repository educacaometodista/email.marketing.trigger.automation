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
        //UMESP - Ausentes - Presencial
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'UMESP Ausentes Presencial';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 1;
        $tipo_de_acao_da_instituicao->instituicao_id = 1;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 1;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'UMESP - Ausentes - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'umesp-ausentes-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //UMESP - Inscritos Parciais - Presencial
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'UMESP Inscritos Parciais Presencial';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 3;
        $tipo_de_acao_da_instituicao->instituicao_id = 1;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 2;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'UMESP - Inscritos Parciais - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'umesp-inscritos-parciais-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //UMESP - Lembrete de Prova - Presencial
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'UMESP Lembrete de Prova Presencial';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 5;
        $tipo_de_acao_da_instituicao->instituicao_id = 1;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 3;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'UMESP - Lembrete de Prova - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'umesp-lembrete-de-prova-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();
    }
}
