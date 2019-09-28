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
        $instituicao->nome_do_remetente = 'Universidade Metodista de São Paulo';
        $instituicao->email_do_remetente = 'informes@metodista.br';
        $instituicao->email_de_retorno = 'informes@metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista de Ensino Superior EaD';
        $instituicao->prefixo = 'EaD-UMESP';
        $instituicao->codigo_da_empresa = $codigos['UMESP'];
        $instituicao->nome_do_remetente = 'Universidade Metodista de São Paulo EaD';
        $instituicao->email_do_remetente = 'informes@metodista.br';
        $instituicao->email_de_retorno = 'informes@metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Educacional Piracicabano';
        $instituicao->prefixo = 'UNIMEP';
        $instituicao->codigo_da_empresa = $codigos['UNIMEP'];
        $instituicao->nome_do_remetente = 'Universidade Metodista de Piracicaba';
        $instituicao->email_do_remetente = 'unimep@metodista.br';
        $instituicao->email_de_retorno = 'unimep@metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Educacional Piracicabano EaD';
        $instituicao->prefixo = 'EaD-UNIMEP';
        $instituicao->codigo_da_empresa = $codigos['UNIMEP'];
        $instituicao->nome_do_remetente = 'Universidade Metodista de Piracicaba EaD';
        $instituicao->email_do_remetente = 'unimep@metodista.br';
        $instituicao->email_de_retorno = 'unimep@metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Izabela Hendrix';
        $instituicao->prefixo = 'Izabela';
        $instituicao->codigo_da_empresa = $codigos['IZABELA'];
        $instituicao->nome_do_remetente = 'Centro Universitário Metodista Izabela Hendrix';
        $instituicao->email_do_remetente = 'informes.imih@izabelahendrix.metodista.br';
        $instituicao->email_de_retorno = 'informes.imih@izabelahendrix.metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Izabela Hendrix EaD';
        $instituicao->prefixo = 'EaD-Izabela';
        $instituicao->codigo_da_empresa = $codigos['IZABELA'];
        $instituicao->nome_do_remetente = 'Centro Universitário Metodista Izabela Hendrix EaD';
        $instituicao->email_do_remetente = 'informes.imih@izabelahendrix.metodista.br';
        $instituicao->email_de_retorno = 'informes.imih@izabelahendrix.metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Granbery';
        $instituicao->prefixo = 'Granbery';
        $instituicao->codigo_da_empresa = $codigos['GRANBERY'];
        $instituicao->nome_do_remetente = 'Faculdade Metodista Granbery';
        $instituicao->email_do_remetente = 'informes.granbery@granbery.metodista.br';
        $instituicao->email_de_retorno = 'informes.granbery@granbery.metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Granbery EaD';
        $instituicao->prefixo = 'EaD-Granbery';
        $instituicao->codigo_da_empresa = $codigos['GRANBERY'];
        $instituicao->nome_do_remetente = 'Faculdade Metodista Granbery EaD';
        $instituicao->email_do_remetente = 'informes.granbery@granbery.metodista.br';
        $instituicao->email_de_retorno = 'informes.granbery@granbery.metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Centenário';
        $instituicao->prefixo = 'Fames';
        $instituicao->codigo_da_empresa = $codigos['CENTENARIO'];
        $instituicao->nome_do_remetente = 'Faculdade Metodista Centenário';
        $instituicao->email_do_remetente = 'informes.centenario@centenario.metodista.br';
        $instituicao->email_de_retorno = 'informes.centenario@centenario.metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Centenário EaD';
        $instituicao->prefixo = 'EaD-Fames';
        $instituicao->codigo_da_empresa = $codigos['CENTENARIO'];
        $instituicao->nome_do_remetente = 'Faculdade Metodista Centenário EaD';
        $instituicao->email_do_remetente = 'informes.centenario@centenario.metodista.br';
        $instituicao->email_de_retorno = 'informes.centenario@centenario.metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Porto Alegre da Igreja Metodista';
        $instituicao->prefixo = 'IPA';
        $instituicao->codigo_da_empresa = $codigos['IPA'];
        $instituicao->nome_do_remetente = 'Centro Universitário Metodista IPA';
        $instituicao->email_do_remetente = 'comunicados@ipa.metodista.br';
        $instituicao->email_de_retorno = 'comunicados@ipa.metodista.br';
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Porto Alegre da Igreja Metodista EaD';
        $instituicao->prefixo = 'EaD-IPA';
        $instituicao->codigo_da_empresa = $codigos['IPA'];
        $instituicao->nome_do_remetente = 'Centro Universitário Metodista IPA EaD';
        $instituicao->email_do_remetente = 'comunicados@ipa.metodista.br';
        $instituicao->email_de_retorno = 'comunicados@ipa.metodista.br';
        $instituicao->save();
    }
}
