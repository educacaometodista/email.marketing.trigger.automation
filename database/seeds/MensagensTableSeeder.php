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
        /*$mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->url = 'http://portal.metodista.br/msg/campanha/vestibular/2020/1-semestre/presencial/ausentes';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao = 'Ausentes';
        $mensagem->instituicao_id = 1;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->url = 'http://portal.metodista.br/msg/campanha/vestibular/2020/1-semestre/presencial/leads-incompletos';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao = 'Inscritos Parciais';
        $mensagem->instituicao_id = 1;
        $mensagem->save();
        */

        $host = include __DIR__.'/host.php';
        $path = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://').$host.'/mensagens';

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        //$mensagem->url = 'http://portal.metodista.br/msg/campanha/vestibular/2020/1-semestre/presencial/lembrete-de-prova/';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->content = get_file_content($path.'/umesp/lembrete-de-prova.html');
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao = 'Lembrete de Prova';
        $mensagem->instituicao_id = 1;
        $mensagem->save();

        

        /*$mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculado - Template Branco';
        $mensagem->url = 'http://portal.metodista.br/msg/campanha/vestibular/2020/1-semestre/presencial/aprovados-nao-matriculados';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao = 'Aprovados Não Matriculado';
        $mensagem->instituicao_id = 1;
        $mensagem->save();

        //UMESP Ead
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais Ead - Template Branco';
        $mensagem->url = 'http://portal.metodista.br/msg/campanha/vestibular/2020/1-semestre/ead/leads-incompletos';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao = 'Inscritos Parciais a Distancia';
        $mensagem->instituicao_id = 2;
        $mensagem->save();

        //UNIMEP
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->url = 'http://unimep.edu.br/msg/campanha/vestibular/2020/1-semestre/presencial/ausentes';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao = 'Ausentes';
        $mensagem->instituicao_id = 3;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->url = 'http://unimep.edu.br/msg/campanha/vestibular/2020/1-semestre/presencial/leads-incompletos';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao = 'Inscritos Parciais';
        $mensagem->instituicao_id = 3;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->url = 'http://unimep.edu.br/msg/campanha/vestibular/2020/1-semestre/presencial/lembrete-de-prova';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao = 'Lembrete de Prova';
        $mensagem->instituicao_id = 3;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculado - Template Branco';
        $mensagem->url = 'http://unimep.edu.br/msg/campanha/vestibular/2020/1-semestre/presencial/aprovados-nao-matriculados';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao = 'Aprovados Não Matriculado';
        $mensagem->instituicao_id = 3;
        $mensagem->save();

        //Izabela
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->url = 'http://izabelahendrix.edu.br/msg/campanha/vestibular/2020/1-semestre/presencial/ausentes';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao = 'Ausentes';
        $mensagem->instituicao_id = 4;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->url = 'http://izabelahendrix.edu.br/msg/campanha/vestibular/2020/1-semestre/presencial/leads-incompletos';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao = 'Inscritos Parciais';
        $mensagem->instituicao_id = 4;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->url = 'http://izabelahendrix.edu.br/msg/campanha/vestibular/2020/1-semestre/presencial/lembrete-de-prova';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando! ';
        $mensagem->tipo_de_acao = 'Lembrete de Prova';
        $mensagem->instituicao_id = 4;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculado - Template Branco';
        $mensagem->url = 'http://unimep.edu.br/msg/campanha/vestibular/2020/1-semestre/presencial/aprovados-nao-matriculados';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao = 'Aprovados Não Matriculado';
        $mensagem->instituicao_id = 4;
        $mensagem->save();

        //Granbery
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->url = 'http://granbery.edu.br/msg/campanha/vestibular/2020/presencial/ausentes';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao = 'Ausentes';
        $mensagem->instituicao_id = 5;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->url = 'http://granbery.edu.br/msg/campanha/vestibular/2020/presencial/leads-incompletos';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao = 'Inscritos Parciais';
        $mensagem->instituicao_id = 5;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->url = 'http://granbery.edu.br/msg/campanha/vestibular/2020/presencial/lembrete-de-prova';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao = 'Lembrete de Prova';
        $mensagem->instituicao_id = 5;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculado - Template Branco';
        $mensagem->url = 'http://granbery.edu.br/msg/campanha/vestibular/2020/presencial/aprovados-nao-matriculados';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao = 'Aprovados Não Matriculado';
        $mensagem->instituicao_id = 5;
        $mensagem->save();

        //Fames
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->url = 'http://metodistacentenario.com.br/msg/campanha/vestibular/2020/1-semestre/presencial/ausentes';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao = 'Ausentes';
        $mensagem->instituicao_id = 6;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->url = 'http://metodistacentenario.com.br/msg/campanha/vestibular/2020/1-semestre/presencial/leads-incompletos';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao = 'Inscritos Parciais';
        $mensagem->instituicao_id = 6;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->url = 'http://metodistacentenario.com.br/msg/campanha/vestibular/2020/1-semestre/presencial/lembrete-de-prova';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando! ';
        $mensagem->tipo_de_acao = 'Lembrete de Prova';
        $mensagem->instituicao_id = 6;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculado - Template Branco';
        $mensagem->url = 'http://metodistacentenario.com.br/msg/campanha/vestibular/2020/1-semestre/presencial/aprovados-nao-matriculados';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao = 'Aprovados Não Matriculado';
        $mensagem->instituicao_id = 6;
        $mensagem->save();

        //IPA
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->url = 'http://ipametodista.edu.br/msg/campanha/vestibular/2020/1-semestre/presencial/ausentes';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao = 'Ausentes';
        $mensagem->instituicao_id = 7;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->url = 'http://ipametodista.edu.br/msg/campanha/vestibular/2020/1-semestre/presencial/leads-incompletos';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao = 'Inscritos Parciais';
        $mensagem->instituicao_id = 7;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->url = 'http://ipametodista.edu.br/msg/campanha/vestibular/2020/1-semestre/presencial/lembrete-de-prova';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao = 'Lembrete de Prova';
        $mensagem->instituicao_id = 7;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculado - Template Branco';
        $mensagem->url = 'http://metodistacentenario.com.br/msg/campanha/vestibular/2020/1-semestre/presencial/aprovados-nao-matriculados';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao = 'Aprovados Não Matriculado';
        $mensagem->instituicao_id = 7;
        $mensagem->save();*/
        
    }

}