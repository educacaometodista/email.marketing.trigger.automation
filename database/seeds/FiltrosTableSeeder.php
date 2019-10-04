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
        $filtro->nome = '';
        $filtro->regra = '';
        $filtro->save();
    }
}
