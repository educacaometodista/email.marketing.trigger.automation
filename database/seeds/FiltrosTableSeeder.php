<?php

use Illuminate\Database\Seeder;

class FiltrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filtro = new App\Filtro;
        $filtro->nome = 'teste filtro';
        $filtro->regra = 'return [
            "NOME" => "nome",
            "EMAIL" => "e_mail",
            "CELULAR" => "celular",
            "INSTITUICAO" => "instituição"
        ];';
        $filtro->save();

        $filtro = new App\Filtro;
        $filtro->nome = 'teste filtro ead';
        $filtro->regra = 'return [
            "NOME" => "nome",
            "EMAIL" => "e_mail",
            "DDD" => "ddd",
            "NUMERO" => "número"
        ];';
        $filtro->save();
    }
}
