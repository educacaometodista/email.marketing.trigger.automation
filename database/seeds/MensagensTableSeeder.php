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
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Branco';
        $mensagem->url = 'http://portal.metodista.br/msg/campanha/vestibular/2019/2-semestre/inscricoes/ausentes';
        $mensagem->assunto = 'Sentimos sua falta no Vestibular | Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao = 'Ausentes';
        $mensagem->instituicao_id = 1;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais Ead - Branco';
        $mensagem->url = 'http://portal.metodista.br/msg/campanha/vestibular/2019/2-semestre/inscricoes/ausentes';
        $mensagem->assunto = 'Inscritos Parciais Ead';
        $mensagem->tipo_de_acao = 'Inscritos Parciais a Distancia';
        $mensagem->instituicao_id = 2;
        $mensagem->save();
    }

}