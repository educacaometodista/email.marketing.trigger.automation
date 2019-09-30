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
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/umesp/ausentes.html'));
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao_id = 1;
        $mensagem->instituicao_id = 1;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/umesp/inscritos-parciais.html'));
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao_id = 3;
        $mensagem->instituicao_id = 1;
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/umesp/lembrete-de-prova.html'));
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao_id = 5;
        $mensagem->instituicao_id = 1;
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados - Template Branco';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/umesp/aprovados-nao-matriculados.html'));
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao_id = 7;
        $mensagem->instituicao_id = 1;
        $mensagem->save();

        //UMESP EaD
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-umesp/ausentes.html'));
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao_id = 1;
        $mensagem->instituicao_id = 2;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-umesp/inscritos-parciais.html'));
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao_id = 3;
        $mensagem->instituicao_id = 2;
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-umesp/lembrete-de-prova.html'));
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao_id = 5;
        $mensagem->instituicao_id = 2;
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados - Template Branco';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-umesp/aprovados-nao-matriculados.html'));
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao_id = 7;
        $mensagem->instituicao_id = 2;
        $mensagem->save();
        
        //UNIMEP
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/unimep/ausentes.html'));
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao_id = 1;
        $mensagem->instituicao_id = 3;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/unimep/inscritos-parciais.html'));
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao_id = 3;
        $mensagem->instituicao_id = 3;
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/unimep/lembrete-de-prova.html'));
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao_id = 5;
        $mensagem->instituicao_id = 3;
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados - Template Branco';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/unimep/aprovados-nao-matriculados.html'));
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao_id = 7;
        $mensagem->instituicao_id = 3;
        $mensagem->save();

        //UNIMEP EaD
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-unimep/ausentes.html'));
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao_id = 1;
        $mensagem->instituicao_id = 4;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-unimep/inscritos-parciais.html'));
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao_id = 3;
        $mensagem->instituicao_id = 4;
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-unimep/lembrete-de-prova.html'));
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao_id = 5;
        $mensagem->instituicao_id = 4;
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados - Template Branco';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-unimep/aprovados-nao-matriculados.html'));
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao_id = 7;
        $mensagem->instituicao_id = 4;
        $mensagem->save();

        //Izabela
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/izabela/ausentes.html'));
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao_id = 1;
        $mensagem->instituicao_id = 5;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/izabela/inscritos-parciais.html'));
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao_id = 3;
        $mensagem->instituicao_id = 5;
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/izabela/lembrete-de-prova.html'));
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao_id = 5;
        $mensagem->instituicao_id = 5;
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados - Template Branco';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/izabela/aprovados-nao-matriculados.html'));
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao_id = 7;
        $mensagem->instituicao_id = 5;
        $mensagem->save();

        //Izabela EaD
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-izabela/ausentes.html'));
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao_id = 1;
        $mensagem->instituicao_id = 6;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-izabela/inscritos-parciais.html'));
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao_id = 3;
        $mensagem->instituicao_id = 6;
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-izabela/lembrete-de-prova.html'));
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao_id = 5;
        $mensagem->instituicao_id = 6;
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados - Template Branco';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-izabela/aprovados-nao-matriculados.html'));
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao_id = 7;
        $mensagem->instituicao_id = 6;
        $mensagem->save();        

        //Granbery
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/granbery/ausentes.html'));
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao_id = 1;
        $mensagem->instituicao_id = 7;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/granbery/inscritos-parciais.html'));
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao_id = 3;
        $mensagem->instituicao_id = 7;
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/granbery/lembrete-de-prova.html'));
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao_id = 5;
        $mensagem->instituicao_id = 7;
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados - Template Branco';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/granbery/aprovados-nao-matriculados.html'));
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao_id = 7;
        $mensagem->instituicao_id = 7;
        $mensagem->save();        

        //Granbery EaD
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-granbery/ausentes.html'));
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao_id = 1;
        $mensagem->instituicao_id = 8;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-granbery/inscritos-parciais.html'));
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao_id = 3;
        $mensagem->instituicao_id = 8;
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-granbery/lembrete-de-prova.html'));
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao_id = 5;
        $mensagem->instituicao_id = 8;
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados - Template Branco';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-granbery/aprovados-nao-matriculados.html'));
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao_id = 7;
        $mensagem->instituicao_id = 8;
        $mensagem->save();        
      
        //Fames
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/fames/ausentes.html'));
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao_id = 1;
        $mensagem->instituicao_id = 9;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/fames/inscritos-parciais.html'));
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao_id = 3;
        $mensagem->instituicao_id = 9;
        $mensagem->save();
        
        /*$mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/fames/lembrete-de-prova.html'));
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao_id = 5;
        $mensagem->instituicao_id = 9;
        $mensagem->save();*/        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados - Template Branco';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/fames/aprovados-nao-matriculados.html'));
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao_id = 7;
        $mensagem->instituicao_id = 9;
        $mensagem->save();        

        //Fames EaD
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-fames/ausentes.html'));
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao_id = 1;
        $mensagem->instituicao_id = 10;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-fames/inscritos-parciais.html'));
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao_id = 3;
        $mensagem->instituicao_id = 10;
        $mensagem->save();
        
        /*$mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-fames/lembrete-de-prova.html'));
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao_id = 5;
        $mensagem->instituicao_id = 10;
        $mensagem->save();*/

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados - Template Branco';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-fames/aprovados-nao-matriculados.html'));
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao_id = 7;
        $mensagem->instituicao_id = 10;
        $mensagem->save();        

        //IPA
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ipa/ausentes.html'));
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao_id = 1;
        $mensagem->instituicao_id = 11;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ipa/inscritos-parciais.html'));
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao_id = 3;
        $mensagem->instituicao_id = 11;
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ipa/lembrete-de-prova.html'));
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao_id = 5;
        $mensagem->instituicao_id = 11;
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados - Template Branco';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ipa/aprovados-nao-matriculados.html'));
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao_id = 7;
        $mensagem->instituicao_id = 11;
        $mensagem->save();        

        //IPA EaD
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes - Template Branco';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-ipa/ausentes.html'));
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->tipo_de_acao_id = 1;
        $mensagem->instituicao_id = 12;
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Inscritos Parciais - Template Branco';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-ipa/inscritos-parciais.html'));
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->tipo_de_acao_id = 3;
        $mensagem->instituicao_id = 12;
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova - Template Branco';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-ipa/lembrete-de-prova.html'));
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->tipo_de_acao_id = 5;
        $mensagem->instituicao_id = 12;
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados - Template Branco';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo = file_get_contents(public_path('mensagens/ead-ipa/aprovados-nao-matriculados.html'));
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->tipo_de_acao_id = 7;
        $mensagem->instituicao_id = 12;
        $mensagem->save();

    }

}