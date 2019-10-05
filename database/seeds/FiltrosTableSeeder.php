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
        $filtro->regra = 'teste filtro';
        $filtro->save();
    }
}
