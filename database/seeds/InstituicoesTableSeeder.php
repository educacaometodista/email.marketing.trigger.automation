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
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Educacional Piracicabano';
        $instituicao->prefixo = 'UNIMEP';
        $instituicao->codigo_da_empresa = $codigos['UNIMEP'];
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Izabela Hendrix';
        $instituicao->prefixo = 'Izabela';
        $instituicao->codigo_da_empresa = $codigos['IZABELA'];
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Granbery';
        $instituicao->prefixo = 'Granbery';
        $instituicao->codigo_da_empresa = $codigos['GRANBERY'];
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Metodista Centenário';
        $instituicao->prefixo = 'Fames';
        $instituicao->codigo_da_empresa = $codigos['CENTENARIO'];
        $instituicao->save();

        $instituicao = new App\Instituicao;
        $instituicao->nome = 'Instituto Porto Alegre da Igreja Metodista';
        $instituicao->prefixo = 'IPA';
        $instituicao->codigo_da_empresa = $codigos['IPA'];
        $instituicao->save();
    }
}
