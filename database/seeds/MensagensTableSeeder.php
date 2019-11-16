<?php
use Illuminate\Database\Seeder;

class MensagensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     */
    public function run()
    {
        //UMESP
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes de Prova';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/umesp/ausentes.html'));
        $mensagem->conteudo_do_sms = 'Sentimos sua falta, mas voce ainda pode participar do Vestibular. https://vestibularmetodista.com.br';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Leads Incompletos';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/umesp/inscritos-parciais.html'));
        $mensagem->conteudo_do_sms = 'Falta pouco para finalizar sua inscricao. Acesse o site, escolha seu curso e agende sua prova. https://vestibularmetodista.com.br';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/umesp/lembrete-de-prova.html'));
        $mensagem->conteudo_do_sms = 'Sua prova sera em XX/XX. Voce recebera o resultado na hora. Para matricula: menores de 18 devem ir acompanhados. Pagamento c/ cartao.';
        $mensagem->assunto = 'Não se esqueça: o dia da sua visita está chegando!';
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/umesp/aprovados-nao-matriculados.html'));
        $mensagem->conteudo_do_sms = 'Parabens, voce foi aprovado. Faca sua matricula e garanta 50% de desconto na 1a mensalidade. Mais no seu e-mail.';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->save();

        //UMESP EaD
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes de Prova';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-umesp/ausentes.html'));
        $mensagem->conteudo_do_sms = 'Sentimos sua falta, mas voce ainda pode participar do Vestibular. Inscricoes abertas: metodista.br/ead';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2020';
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Leads Incompletos';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-umesp/inscritos-parciais.html'));
        $mensagem->conteudo_do_sms = 'Falta pouco para finalizar sua inscricao. Acesse o site, escolha seu curso e agende sua prova: http://portal.metodista.br/ead/';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-umesp/lembrete-de-prova.html'));
        $mensagem->conteudo_do_sms = 'Sua prova sera em XX/XX. Voce recebera o resultado na hora. Para matricula: menores de 18 devem ir acompanhados. Pagamento c/ cartao.';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-umesp/aprovados-nao-matriculados.html'));
        $mensagem->conteudo_do_sms = 'Parabens, voce foi aprovado. Faca sua matricula ate o vencimento do boleto e garanta 50% de desconto na 1a mensalidade. Mais no seu e-mail.';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->save();
        
        //UNIMEP
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes de Prova';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/unimep/ausentes.html'));
        $mensagem->conteudo_do_sms = 'Sentimos sua falta, mas voce ainda pode participar do Vestibular.  https://vestibularunimep.com.br';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Leads Incompletos';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/unimep/inscritos-parciais.html'));
        $mensagem->conteudo_do_sms = 'Falta pouco para finalizar sua inscricao. Acesse o site, escolha seu curso e agende sua prova. https://vestibularunimep.com.br';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/unimep/lembrete-de-prova.html'));
        $mensagem->conteudo_do_sms = 'Sua prova sera em XX/XX. Voce recebera o resultado na hora. Para matricula: menores de 18 devem ir acompanhados. Pagamento c/ cartao.';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/unimep/aprovados-nao-matriculados.html'));
        $mensagem->conteudo_do_sms = 'Parabens, voce foi aprovado. Faca sua matricula e garanta 50% de desconto na 1a mensalidade. Mais no seu e-mail.';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->save();

        //UNIMEP EaD
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes de Prova';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-unimep/ausentes.html'));
        $mensagem->conteudo_do_sms = 'Sentimos sua falta, mas voce ainda pode participar do Vestibular. Inscricoes abertas: metodista.br/ead';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Leads Incompletos';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-unimep/inscritos-parciais.html'));
        $mensagem->conteudo_do_sms = 'Falta pouco para finalizar sua inscricao. Acesse o site, escolha seu curso e agende sua prova: http://portal.metodista.br/ead/';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-unimep/lembrete-de-prova.html'));
        $mensagem->conteudo_do_sms = 'Sua prova sera em XX/XX. Voce recebera o resultado na hora. Para matricula: menores de 18 devem ir acompanhados. Pagamento c/ cartao.';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-unimep/aprovados-nao-matriculados.html'));
        $mensagem->conteudo_do_sms = 'Parabens, voce foi aprovado. Faca sua matricula ate o vencimento do boleto e garanta 50% de desconto na 1a mensalidade. Mais no seu e-mail.';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->save();

        //Izabela
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes de Prova';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/izabela/ausentes.html'));
        $mensagem->conteudo_do_sms = 'Sentimos sua falta, mas voce ainda pode participar do Vestibular. https://vestibularizabelahendrix.com.br';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Leads Incompletos';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/izabela/inscritos-parciais.html'));
        $mensagem->conteudo_do_sms = 'Falta pouco para finalizar sua inscricao. Acesse o site, escolha seu curso e agende sua prova. https://vestibularizabelahendrix.com.br';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/izabela/lembrete-de-prova.html'));
        $mensagem->conteudo_do_sms = 'Sua prova sera em XX/XX. Voce recebera o resultado na hora. Para matricula: menores de 18 devem ir acompanhados. Pagamento c/ cartao.';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/izabela/aprovados-nao-matriculados.html'));
        $mensagem->conteudo_do_sms = 'Parabens, voce foi aprovado. Faca sua matricula e garanta 50% de desconto na 1a mensalidade. Mais no seu e-mail.';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->save();

        //Izabela EaD
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes de Prova';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-izabela/ausentes.html'));
        $mensagem->conteudo_do_sms = 'Sentimos sua falta, mas voce ainda pode participar do Vestibular. Inscricoes abertas: metodista.br/ead';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Leads Incompletos';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-izabela/inscritos-parciais.html'));
        $mensagem->conteudo_do_sms = 'Falta pouco para finalizar sua inscricao. Acesse o site, escolha seu curso e agende sua prova: http://portal.metodista.br/ead/';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-izabela/lembrete-de-prova.html'));
        $mensagem->conteudo_do_sms = 'Sua prova sera em XX/XX. Voce recebera o resultado na hora. Para matricula: menores de 18 devem ir acompanhados. Pagamento c/ cartao.';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-izabela/aprovados-nao-matriculados.html'));
        $mensagem->conteudo_do_sms = 'Parabens, voce foi aprovado. Faca sua matricula ate o vencimento do boleto e garanta 50% de desconto na 1a mensalidade. Mais no seu e-mail.';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->save();        

        //Granbery
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes de Prova';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/granbery/ausentes.html'));
        $mensagem->conteudo_do_sms = 'Sentimos sua falta, mas voce ainda pode participar do Vestibular. https://vestibulargranbery.com.br';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Leads Incompletos';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/granbery/inscritos-parciais.html'));
        $mensagem->conteudo_do_sms = 'Falta pouco para finalizar sua inscricao. Acesse o site, escolha seu curso e agende sua prova. https://vestibulargranbery.com.br';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/granbery/lembrete-de-prova.html'));
        $mensagem->conteudo_do_sms = 'Sua prova sera em XX/XX. Voce recebera o resultado na hora. Para matricula: menores de 18 devem ir acompanhados. Pagamento c/ cartao.';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/granbery/aprovados-nao-matriculados.html'));
        $mensagem->conteudo_do_sms = 'Parabens, voce foi aprovado. Faca sua matricula e garanta 50% de desconto na 1a mensalidade. Mais no seu e-mail.';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->save();        

        //Granbery EaD
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes de Prova';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-granbery/ausentes.html'));
        $mensagem->conteudo_do_sms = 'Sentimos sua falta, mas voce ainda pode participar do Vestibular. Inscricoes abertas: metodista.br/ead';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Leads Incompletos';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-granbery/inscritos-parciais.html'));
        $mensagem->conteudo_do_sms = 'Falta pouco para finalizar sua inscricao. Acesse o site, escolha seu curso e agende sua prova: http://portal.metodista.br/ead/';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-granbery/lembrete-de-prova.html'));
        $mensagem->conteudo_do_sms = 'Sua prova sera em XX/XX. Voce recebera o resultado na hora. Para matricula: menores de 18 devem ir acompanhados. Pagamento c/ cartao.';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-granbery/aprovados-nao-matriculados.html'));
        $mensagem->conteudo_do_sms = 'Parabens, voce foi aprovado. Faca sua matricula ate o vencimento do boleto e garanta 50% de desconto na 1a mensalidade. Mais no seu e-mail.';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->save();        
      
        //Fames
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes de Prova';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/fames/ausentes.html'));
        $mensagem->conteudo_do_sms = 'Sentimos sua falta, mas voce ainda pode participar do Vestibular.https://vestibularcentenario.com.br';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Leads Incompletos';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/fames/inscritos-parciais.html'));
        $mensagem->conteudo_do_sms = 'Falta pouco para finalizar sua inscricao. Acesse o site, escolha seu curso e agende sua prova. https://vestibularcentenario.com.br';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/fames/lembrete-de-prova.html'));
        $mensagem->conteudo_do_sms = 'Sua prova sera em XX/XX. Voce recebera o resultado na hora. Para matricula: menores de 18 devem ir acompanhados. Pagamento c/ cartao.';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->save();    

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/fames/aprovados-nao-matriculados.html'));
        $mensagem->conteudo_do_sms = 'Parabens, voce foi aprovado. Faca sua matricula e garanta 50% de desconto na 1a mensalidade. Mais no seu e-mail.';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->save();        

        //Fames EaD
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes de Prova';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-fames/ausentes.html'));
        $mensagem->conteudo_do_sms = 'Sentimos sua falta, mas voce ainda pode participar do Vestibular. Inscricoes abertas: metodista.br/ead';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Leads Incompletos';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-fames/inscritos-parciais.html'));
        $mensagem->conteudo_do_sms = 'Falta pouco para finalizar sua inscricao. Acesse o site, escolha seu curso e agende sua prova: http://portal.metodista.br/ead/';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-fames/lembrete-de-prova.html'));
        $mensagem->conteudo_do_sms = 'Sua prova sera em XX/XX. Voce recebera o resultado na hora. Para matricula: menores de 18 devem ir acompanhados. Pagamento c/ cartao.';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-fames/aprovados-nao-matriculados.html'));
        $mensagem->conteudo_do_sms = 'Parabens, voce foi aprovado. Faca sua matricula ate o vencimento do boleto e garanta 50% de desconto na 1a mensalidade. Mais no seu e-mail.';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->save();        

        //IPA
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes de Prova';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ipa/ausentes.html'));
        $mensagem->conteudo_do_sms = 'Sentimos sua falta, mas voce ainda pode participar do Vestibular. https://vestibularipa.com.br';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Leads Incompletos';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ipa/inscritos-parciais.html'));
        $mensagem->conteudo_do_sms = 'Falta pouco para finalizar sua inscricao. Acesse o site, escolha seu curso e agende sua prova. https://vestibularipa.com.br';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ipa/lembrete-de-prova.html'));
        $mensagem->conteudo_do_sms = 'Sua prova sera em XX/XX. Voce recebera o resultado na hora. Para matricula: menores de 18 devem ir acompanhados. Pagamento c/ cartao.';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ipa/aprovados-nao-matriculados.html'));
        $mensagem->conteudo_do_sms = 'Parabens, voce foi aprovado. Faca sua matricula e garanta 50% de desconto na 1a mensalidade. Mais no seu e-mail.';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->save();        

        //IPA EaD
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Ausentes de Prova';
        $mensagem->nome_do_arquivo = 'ausentes';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-ipa/ausentes.html'));
        $mensagem->conteudo_do_sms = 'Sentimos sua falta, mas voce ainda pode participar do Vestibular. Inscricoes abertas: metodista.br/ead';
        $mensagem->assunto = 'Sentimos sua falta! Mas ainda dá tempo de começar sua graduação em 2019';
        $mensagem->save();

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Leads Incompletos';
        $mensagem->nome_do_arquivo = 'inscritos-parciais';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-ipa/inscritos-parciais.html'));
        $mensagem->conteudo_do_sms = 'Falta pouco para finalizar sua inscricao. Acesse o site, escolha seu curso e agende sua prova: http://portal.metodista.br/ead/';
        $mensagem->assunto = '[PRIMEIRONOME], finalize sua inscrição no Vestibular';
        $mensagem->save();
        
        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Lembrete de Prova';
        $mensagem->nome_do_arquivo = 'lembrete-de-prova';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-ipa/lembrete-de-prova.html'));
        $mensagem->conteudo_do_sms = 'Sua prova sera em XX/XX. Voce recebera o resultado na hora. Para matricula: menores de 18 devem ir acompanhados. Pagamento c/ cartao.';
        $mensagem->assunto = 'Não se esqueça: o dia da sua prova está chegando!';
        $mensagem->save();        

        $mensagem = new App\Mensagem;
        $mensagem->titulo = 'Aprovados Não Matriculados';
        $mensagem->nome_do_arquivo = 'aprovados-nao-matriculados';
        $mensagem->conteudo_do_email = file_get_contents(public_path('mensagens/ead-ipa/aprovados-nao-matriculados.html'));
        $mensagem->conteudo_do_sms = 'Parabens, voce foi aprovado. Faca sua matricula ate o vencimento do boleto e garanta 50% de desconto na 1a mensalidade. Mais no seu e-mail.';
        $mensagem->assunto = 'Falta pouco para você finalizar sua matrícula';
        $mensagem->save();

    }

}