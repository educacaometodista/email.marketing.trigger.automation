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
        //UMESP - Ausentes
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'UMESP Ausentes';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 1;
        $tipo_de_acao_da_instituicao->instituicao_id = 1;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 1;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'UMESP - Ausentes - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'umesp-ausentes-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //UMESP - Inscritos Parciais
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'UMESP Inscritos Parciais';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 3;
        $tipo_de_acao_da_instituicao->instituicao_id = 1;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 2;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'UMESP - Inscritos Parciais - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'umesp-inscritos-parciais-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //UMESP - Lembrete de Prova
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'UMESP Lembrete de Prova';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 5;
        $tipo_de_acao_da_instituicao->instituicao_id = 1;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 3;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'UMESP - Lembrete de Prova - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'umesp-lembrete-de-prova-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //UMESP - Aprovados Não Matriculados
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'UMESP Aprovados Não Matriculados';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 7;
        $tipo_de_acao_da_instituicao->instituicao_id = 1;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 4;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'UMESP - Aprovados Não Matriculados - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'umesp-aprovados-nao-matriculados-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();





        //EaD UMESP - Ausentes
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD UMESP Ausentes';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 2;
        $tipo_de_acao_da_instituicao->instituicao_id = 2;
        $tipo_de_acao_da_instituicao->filtro_id = 2;
        $tipo_de_acao_da_instituicao->mensagem_id = 5;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD UMESP - Ausentes - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-umesp-ausentes-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD UMESP - Inscritos Parciais
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD UMESP Inscritos Parciais';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 4;
        $tipo_de_acao_da_instituicao->instituicao_id = 2;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 6;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD UMESP - Inscritos Parciais - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-umesp-inscritos-parciais-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD UMESP - Lembrete de Prova
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD UMESP Lembrete de Prova';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 6;
        $tipo_de_acao_da_instituicao->instituicao_id = 2;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 7;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD UMESP - Lembrete de Prova - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-umesp-lembrete-de-prova-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD UMESP - Aprovados Não Matriculados
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD UMESP Aprovados Não Matriculados';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 8;
        $tipo_de_acao_da_instituicao->instituicao_id = 2;
        $tipo_de_acao_da_instituicao->filtro_id = 2;
        $tipo_de_acao_da_instituicao->mensagem_id = 8;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD UMESP - Aprovados Não Matriculados - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-umesp-aprovados-nao-matriculados-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();














        //UNIMEP - Ausentes
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'UNIMEP Ausentes';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 1;
        $tipo_de_acao_da_instituicao->instituicao_id = 3;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 9;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'UNIMEP - Ausentes - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'unimep-ausentes-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //UNIMEP - Inscritos Parciais
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'UNIMEP Inscritos Parciais';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 3;
        $tipo_de_acao_da_instituicao->instituicao_id = 3;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 10;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'UNIMEP - Inscritos Parciais - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'unimep-inscritos-parciais-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //UNIMEP - Lembrete de Prova
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'UNIMEP Lembrete de Prova';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 5;
        $tipo_de_acao_da_instituicao->instituicao_id = 3;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 11;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'UNIMEP - Lembrete de Prova - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'unimep-lembrete-de-prova-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //UNIMEP - Aprovados Não Matriculados
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'UNIMEP Aprovados Não Matriculados';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 7;
        $tipo_de_acao_da_instituicao->instituicao_id = 3;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 12;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'UNIMEP - Aprovados Não Matriculados - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'unimep-aprovados-nao-matriculados-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();





        //EaD UNIMEP - Ausentes
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD UNIMEP Ausentes';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 2;
        $tipo_de_acao_da_instituicao->instituicao_id = 4;
        $tipo_de_acao_da_instituicao->filtro_id = 2;
        $tipo_de_acao_da_instituicao->mensagem_id = 13;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD UNIMEP - Ausentes - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-unimep-ausentes-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD UNIMEP - Inscritos Parciais
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD UNIMEP Inscritos Parciais';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 4;
        $tipo_de_acao_da_instituicao->instituicao_id = 4;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 14;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD UNIMEP - Inscritos Parciais - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-unimep-inscritos-parciais-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD UNIMEP - Lembrete de Prova
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD UNIMEP Lembrete de Prova';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 6;
        $tipo_de_acao_da_instituicao->instituicao_id = 4;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 15;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD UNIMEP - Lembrete de Prova - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-unimep-lembrete-de-prova-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD UNIMEP - Aprovados Não Matriculados
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD UNIMEP Aprovados Não Matriculados';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 8;
        $tipo_de_acao_da_instituicao->instituicao_id = 4;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 16;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD UNIMEP - Aprovados Não Matriculados - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-unimep-aprovados-nao-matriculados-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();



        







        //Izabela - Ausentes
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'Izabela Ausentes';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 1;
        $tipo_de_acao_da_instituicao->instituicao_id = 5;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 17;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'Izabela - Ausentes - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'izabela-ausentes-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //Izabela - Inscritos Parciais
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'Izabela Inscritos Parciais';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 3;
        $tipo_de_acao_da_instituicao->instituicao_id = 5;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 18;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'Izabela - Inscritos Parciais - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'izabela-inscritos-parciais-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //Izabela - Lembrete de Prova
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'Izabela Lembrete de Prova';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 5;
        $tipo_de_acao_da_instituicao->instituicao_id = 5;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 19;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'Izabela - Lembrete de Prova - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'izabela-lembrete-de-prova-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //Izabela - Aprovados Não Matriculados
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'Izabela Aprovados Não Matriculados';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 7;
        $tipo_de_acao_da_instituicao->instituicao_id = 5;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 20;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'Izabela - Aprovados Não Matriculados - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'izabela-aprovados-nao-matriculados-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();





        //EaD Izabela - Ausentes
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD Izabela Ausentes';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 2;
        $tipo_de_acao_da_instituicao->instituicao_id = 6;
        $tipo_de_acao_da_instituicao->filtro_id = 2;
        $tipo_de_acao_da_instituicao->mensagem_id = 21;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD Izabela - Ausentes - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-izabela-ausentes-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD Izabela - Inscritos Parciais
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD Izabela Inscritos Parciais';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 4;
        $tipo_de_acao_da_instituicao->instituicao_id = 6;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 22;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD Izabela - Inscritos Parciais - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-izabela-inscritos-parciais-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD Izabela - Lembrete de Prova
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD Izabela Lembrete de Prova';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 6;
        $tipo_de_acao_da_instituicao->instituicao_id = 6;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 23;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD Izabela - Lembrete de Prova - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-izabela-lembrete-de-prova-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD Izabela - Aprovados Não Matriculados
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD Izabela Aprovados Não Matriculados';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 8;
        $tipo_de_acao_da_instituicao->instituicao_id = 6;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 24;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD Izabela - Aprovados Não Matriculados - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-izabela-aprovados-nao-matriculados-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();







        //Granbery - Ausentes
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'Granbery Ausentes';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 1;
        $tipo_de_acao_da_instituicao->instituicao_id = 7;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 25;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'Granbery - Ausentes - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'granbery-ausentes-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //Granbery - Inscritos Parciais
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'Granbery Inscritos Parciais';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 3;
        $tipo_de_acao_da_instituicao->instituicao_id = 7;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 26;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'Granbery - Inscritos Parciais - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'granbery-inscritos-parciais-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //Granbery - Lembrete de Prova
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'Granbery Lembrete de Prova';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 5;
        $tipo_de_acao_da_instituicao->instituicao_id = 7;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 27;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'Granbery - Lembrete de Prova - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'granbery-lembrete-de-prova-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //Granbery - Aprovados Não Matriculados
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'Granbery Aprovados Não Matriculados';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 7;
        $tipo_de_acao_da_instituicao->instituicao_id = 7;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 28;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'Granbery - Aprovados Não Matriculados - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'granbery-aprovados-nao-matriculados-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();





        //EaD Granbery - Ausentes
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD Granbery Ausentes';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 2;
        $tipo_de_acao_da_instituicao->instituicao_id = 8;
        $tipo_de_acao_da_instituicao->filtro_id = 2;
        $tipo_de_acao_da_instituicao->mensagem_id = 29;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD Granbery - Ausentes - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-granbery-ausentes-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD Granbery - Inscritos Parciais
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD Granbery Inscritos Parciais';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 4;
        $tipo_de_acao_da_instituicao->instituicao_id = 8;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 30;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD Granbery - Inscritos Parciais - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-granbery-inscritos-parciais-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD Granbery - Lembrete de Prova
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD Granbery Lembrete de Prova';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 6;
        $tipo_de_acao_da_instituicao->instituicao_id = 8;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 31;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD Granbery - Lembrete de Prova - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-granbery-lembrete-de-prova-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD Granbery - Aprovados Não Matriculados
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD Granbery Aprovados Não Matriculados';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 8;
        $tipo_de_acao_da_instituicao->instituicao_id = 8;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 32;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD Granbery - Aprovados Não Matriculados - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-granbery-aprovados-nao-matriculados-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();





        //Centenario - Ausentes
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'Centenario Ausentes';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 1;
        $tipo_de_acao_da_instituicao->instituicao_id = 9;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 33;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'Centenario - Ausentes - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'centenario-ausentes-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //Centenario - Inscritos Parciais
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'Centenario Inscritos Parciais';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 3;
        $tipo_de_acao_da_instituicao->instituicao_id = 9;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 34;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'Centenario - Inscritos Parciais - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'centenario-inscritos-parciais-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //Centenario - Lembrete de Prova
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'Centenario Lembrete de Prova';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 5;
        $tipo_de_acao_da_instituicao->instituicao_id = 9;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 35;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'Centenario - Lembrete de Prova - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'centenario-lembrete-de-prova-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //Centenario - Aprovados Não Matriculados
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'Centenario Aprovados Não Matriculados';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 7;
        $tipo_de_acao_da_instituicao->instituicao_id = 9;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 36;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'Centenario - Aprovados Não Matriculados - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'centenario-aprovados-nao-matriculados-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();





        //EaD Centenario - Ausentes
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD Centenario Ausentes';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 2;
        $tipo_de_acao_da_instituicao->instituicao_id = 10;
        $tipo_de_acao_da_instituicao->filtro_id = 2;
        $tipo_de_acao_da_instituicao->mensagem_id = 37;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD Centenario - Ausentes - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-centenario-ausentes-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD Centenario - Inscritos Parciais
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD Centenario Inscritos Parciais';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 4;
        $tipo_de_acao_da_instituicao->instituicao_id = 10;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 38;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD Centenario - Inscritos Parciais - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-centenario-inscritos-parciais-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD Centenario - Lembrete de Prova
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD Centenario Lembrete de Prova';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 6;
        $tipo_de_acao_da_instituicao->instituicao_id = 10;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 39;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD Centenario - Lembrete de Prova - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-centenario-lembrete-de-prova-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD Centenario - Aprovados Não Matriculados
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD Centenario Aprovados Não Matriculados';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 8;
        $tipo_de_acao_da_instituicao->instituicao_id = 10;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 40;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD Centenario - Aprovados Não Matriculados - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-centenario-aprovados-nao-matriculados-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();




        //IPA - Ausentes
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'IPA Ausentes';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 1;
        $tipo_de_acao_da_instituicao->instituicao_id = 11;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 41;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'IPA - Ausentes - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ipa-ausentes-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //IPA - Inscritos Parciais
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'IPA Inscritos Parciais';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 3;
        $tipo_de_acao_da_instituicao->instituicao_id = 11;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 42;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'IPA - Inscritos Parciais - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ipa-inscritos-parciais-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //IPA - Lembrete de Prova
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'IPA Lembrete de Prova';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 5;
        $tipo_de_acao_da_instituicao->instituicao_id = 11;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 43;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'IPA - Lembrete de Prova - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ipa-lembrete-de-prova-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //IPA - Aprovados Não Matriculados
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'IPA Aprovados Não Matriculados';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 7;
        $tipo_de_acao_da_instituicao->instituicao_id = 11;
        $tipo_de_acao_da_instituicao->filtro_id = 1;
        $tipo_de_acao_da_instituicao->mensagem_id = 44;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'IPA - Aprovados Não Matriculados - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ipa-aprovados-nao-matriculados-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();





        //EaD IPA - Ausentes
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD IPA Ausentes';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 2;
        $tipo_de_acao_da_instituicao->instituicao_id = 12;
        $tipo_de_acao_da_instituicao->filtro_id = 2;
        $tipo_de_acao_da_instituicao->mensagem_id = 45;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD IPA - Ausentes - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-ipa-ausentes-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD IPA - Inscritos Parciais
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD IPA Inscritos Parciais';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 4;
        $tipo_de_acao_da_instituicao->instituicao_id = 12;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 46;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD IPA - Inscritos Parciais - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-ipa-inscritos-parciais-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD IPA - Lembrete de Prova
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD IPA Lembrete de Prova';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 6;
        $tipo_de_acao_da_instituicao->instituicao_id = 12;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 47;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD IPA - Lembrete de Prova - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-ipa-lembrete-de-prova-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();

        //EaD IPA - Aprovados Não Matriculados
        $tipo_de_acao_da_instituicao = new App\TipoDeAcaoDaInstituicao;
        $tipo_de_acao_da_instituicao->nome = 'EaD IPA Aprovados Não Matriculados';
        $tipo_de_acao_da_instituicao->tipo_de_acao_id = 8;
        $tipo_de_acao_da_instituicao->instituicao_id = 12;
        $tipo_de_acao_da_instituicao->filtro_id = 3;
        $tipo_de_acao_da_instituicao->mensagem_id = 48;
        $tipo_de_acao_da_instituicao->nome_da_lista_de_contatos = 'EaD IPA - Aprovados Não Matriculados - [DATE d/m] - [DATE Y]/[DATE HALF]';
        $tipo_de_acao_da_instituicao->nome_do_arquivo = 'ead-ipa-aprovados-nao-matriculados-[DATE d-m-Y]-[DATE HALF].csv';
        $tipo_de_acao_da_instituicao->save();


    }
}
