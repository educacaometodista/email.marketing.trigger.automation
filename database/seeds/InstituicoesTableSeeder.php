<?php

use Illuminate\Database\Seeder;

class InstituicoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $codigos = include __DIR__.'/../../app/Http/Controllers/Emkt/client-codes.php';

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista de Ensino Superior';
        $instituicao->prefixo = 'UMESP';
        $instituicao->codigo_da_empresa = $codigos['UMESP'];
        $instituicao->remetente_do_email = 'Universidade Metodista de São Paulo';
        $instituicao->remetente_do_sms = 'METODISTA';
        $instituicao->email_do_remetente = 'informes@metodista.br';
        $instituicao->email_de_retorno = 'informes@metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista de Ensino Superior EaD';
        $instituicao->prefixo = 'EaD-UMESP';
        $instituicao->codigo_da_empresa = $codigos['UMESP'];
        $instituicao->remetente_do_email = 'Universidade Metodista de São Paulo';
        $instituicao->remetente_do_sms = 'EDUCACAO METODISTA';
        $instituicao->email_do_remetente = 'informes@metodista.br';
        $instituicao->email_de_retorno = 'informes@metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Educacional Piracicabano';
        $instituicao->prefixo = 'UNIMEP';
        $instituicao->codigo_da_empresa = $codigos['UNIMEP'];
        $instituicao->remetente_do_email = 'Universidade Metodista de Piracicaba';
        $instituicao->remetente_do_sms = 'UNIMEP';
        $instituicao->email_do_remetente = 'unimep@metodista.br';
        $instituicao->email_de_retorno = 'unimep@metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Educacional Piracicabano EaD';
        $instituicao->prefixo = 'EaD-UNIMEP';
        $instituicao->codigo_da_empresa = $codigos['UNIMEP'];
        $instituicao->remetente_do_email = 'Universidade Metodista de Piracicaba';
        $instituicao->remetente_do_sms = 'EDUCACAO METODISTA';
        $instituicao->email_do_remetente = 'unimep@metodista.br';
        $instituicao->email_de_retorno = 'unimep@metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Izabela Hendrix';
        $instituicao->prefixo = 'Izabela';
        $instituicao->codigo_da_empresa = $codigos['IZABELA'];
        $instituicao->remetente_do_email = 'Centro Universitário Metodista Izabela Hendrix';
        $instituicao->remetente_do_sms = 'IZABELA';
        $instituicao->email_do_remetente = 'informes.imih@izabelahendrix.metodista.br';
        $instituicao->email_de_retorno = 'informes.imih@izabelahendrix.metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Izabela Hendrix EaD';
        $instituicao->prefixo = 'EaD-Izabela';
        $instituicao->codigo_da_empresa = $codigos['IZABELA'];
        $instituicao->remetente_do_email = 'Centro Universitário Metodista Izabela Hendrix';
        $instituicao->remetente_do_sms = 'EDUCACAO METODISTA';
        $instituicao->email_do_remetente = 'informes.imih@izabelahendrix.metodista.br';
        $instituicao->email_de_retorno = 'informes.imih@izabelahendrix.metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Granbery';
        $instituicao->prefixo = 'Granbery';
        $instituicao->codigo_da_empresa = $codigos['GRANBERY'];
        $instituicao->remetente_do_email = 'Faculdade Metodista Granbery';
        $instituicao->remetente_do_sms = 'GRANBERY';
        $instituicao->email_do_remetente = 'informes.granbery@granbery.metodista.br';
        $instituicao->email_de_retorno = 'informes.granbery@granbery.metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Granbery EaD';
        $instituicao->prefixo = 'EaD-Granbery';
        $instituicao->codigo_da_empresa = $codigos['GRANBERY'];
        $instituicao->remetente_do_email = 'Faculdade Metodista Granbery';
        $instituicao->remetente_do_sms = 'EDUCACAO METODISTA';
        $instituicao->email_do_remetente = 'informes.granbery@granbery.metodista.br';
        $instituicao->email_de_retorno = 'informes.granbery@granbery.metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Centenário';
        $instituicao->prefixo = 'Fames';
        $instituicao->codigo_da_empresa = $codigos['CENTENARIO'];
        $instituicao->remetente_do_email = 'Faculdade Metodista Centenário';
        $instituicao->remetente_do_sms = 'CENTENARIO';
        $instituicao->email_do_remetente = 'informes.centenario@centenario.metodista.br';
        $instituicao->email_de_retorno = 'informes.centenario@centenario.metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Centenário EaD';
        $instituicao->prefixo = 'EaD-Fames';
        $instituicao->codigo_da_empresa = $codigos['CENTENARIO'];
        $instituicao->remetente_do_email = 'Faculdade Metodista Centenário';
        $instituicao->remetente_do_sms = 'EDUCACAO METODISTA';
        $instituicao->email_do_remetente = 'informes.centenario@centenario.metodista.br';
        $instituicao->email_de_retorno = 'informes.centenario@centenario.metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Porto Alegre da Igreja Metodista';
        $instituicao->prefixo = 'IPA';
        $instituicao->codigo_da_empresa = $codigos['IPA'];
        $instituicao->remetente_do_email = 'Centro Universitário Metodista IPA';
        $instituicao->remetente_do_sms = 'IPA';
        $instituicao->email_do_remetente = 'comunicados@ipa.metodista.br';
        $instituicao->email_de_retorno = 'comunicados@ipa.metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Porto Alegre da Igreja Metodista EaD';
        $instituicao->prefixo = 'EaD-IPA';
        $instituicao->codigo_da_empresa = $codigos['IPA'];
        $instituicao->remetente_do_email = 'Centro Universitário Metodista IPA';
        $instituicao->remetente_do_sms = 'EDUCACAO METODISTA';
        $instituicao->email_do_remetente = 'comunicados@ipa.metodista.br';
        $instituicao->email_de_retorno = 'comunicados@ipa.metodista.br';
        $instituicao->save();
    }
}
