<?php
use Illuminate\Database\Seeder;

class TiposDeAcoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_de_acao = new App\TipoDeAcao;
        $tipo_de_acao->nome = 'Ausentes';
        $tipo_de_acao->nome_de_exibicao = 'Ausentes';
        $tipo_de_acao->save();

        $tipo_de_acao = new App\TipoDeAcao;
        $tipo_de_acao->nome = 'Ausentes a Distancia';
        $tipo_de_acao->nome_de_exibicao = 'Ausentes Ead';
        $tipo_de_acao->save();

        $tipo_de_acao = new App\TipoDeAcao;
        $tipo_de_acao->nome = 'Inscritos Parciais';
        $tipo_de_acao->nome_de_exibicao = 'Inscritos Parciais';
        $tipo_de_acao->save();

        $tipo_de_acao = new App\TipoDeAcao;
        $tipo_de_acao->nome = 'Inscritos Parciais a Distancia';
        $tipo_de_acao->nome_de_exibicao = 'Inscritos Parciais Ead';
        $tipo_de_acao->save();

        $tipo_de_acao = new App\TipoDeAcao;
        $tipo_de_acao->nome = 'Lembrete de Prova';
        $tipo_de_acao->nome_de_exibicao = 'Lembrete de Prova';
        $tipo_de_acao->save();

        $tipo_de_acao = new App\TipoDeAcao;
        $tipo_de_acao->nome = 'Lembrete de Prova a Distancia';
        $tipo_de_acao->nome_de_exibicao = 'Lembrete de Prova Ead';
        $tipo_de_acao->save();
        
        $tipo_de_acao = new App\TipoDeAcao;
        $tipo_de_acao->nome = 'Aprovados Não Matriculados';
        $tipo_de_acao->nome_de_exibicao = 'Aprovados Não Matriculados';
        $tipo_de_acao->save();

        $tipo_de_acao = new App\TipoDeAcao;
        $tipo_de_acao->nome = 'Aprovados Não Matriculados a Distancia';
        $tipo_de_acao->nome_de_exibicao = 'Aprovados Não Matriculados Ead';
        $tipo_de_acao->save();

    }

}