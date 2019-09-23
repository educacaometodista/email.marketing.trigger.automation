<?php
use Illuminate\Database\Seeder;

class MensagensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //UMESP
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->url = 'http://portal.metodista.br/msg/campanha/vestibular/2019/2-semestre/inscricoes/ausentes';
        $mensagem->assunto = 'Sentimos sua falta no Vestibular | Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao = 'Ausentes';
        $mensagem->instituicao_id = 1;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->url = 'http://portal.metodista.br/msg/campanha/vestibular/2019/2-semestre/inscricoes/finalize-sua-inscricao';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular da Metodista';
        $mensagem->tipo_de_acao = 'Inscritos Parciais';
        $mensagem->instituicao_id = 1;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->url = 'http://portal.metodista.br/msg/campanha/vestibular/2019/2-semestre/inscricoes/lembrete-de-prova';
        $mensagem->assunto = 'Não se esqueça: a prova da Metodista está chegando!';
        $mensagem->tipo_de_acao = 'Lembrete de Prova';
        $mensagem->instituicao_id = 1;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculado - Template Branco';
        $mensagem->url = 'http://portal.metodista.br/msg/campanha/vestibular/2019/2-semestre/inscricoes/aprovados-nao-matriculados';
        $mensagem->assunto = 'Falta pouco para ser Metô! Confira as orientações para matrícula.';
        $mensagem->tipo_de_acao = 'Aprovados Não Matriculado';
        $mensagem->instituicao_id = 1;
        $mensagem->save();

        //UMESP Ead
        /*$mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais Ead - Template Branco';
        $mensagem->url = '#';
        $mensagem->assunto = '';
        $mensagem->tipo_de_acao = 'Inscritos Parciais a Distancia';
        $mensagem->instituicao_id = 2;
        $mensagem->save();*/

    }

}