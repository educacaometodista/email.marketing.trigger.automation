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
        $filtro->nome = 'Landing';
        $filtro->regra = 'return [
            "NOME" => "nome",
            "EMAIL" => "e_mail",
            "CELULAR" => "celular",
            "INSTITUICAO" => "instituição"
        ];';
        $filtro->save();

        $filtro = new App\Filtro;
        $filtro->nome = 'SGPS 1';
        $filtro->regra = 'return [
            "NOME" => "nome",
            "EMAIL" => "email",
            "DDD" => "ddd2",
            "NUMERO" => "fone2"
        ];';
        $filtro->save();

        $filtro = new App\Filtro;
        $filtro->nome = 'SGPS 2';
        $filtro->regra = 'return [
            "NOME" => "nome",
            "EMAIL" => "e_mail",
            "DDD" => "ddd",
            "NUMERO" => "número"
        ];';
        $filtro->save();
    }
}
