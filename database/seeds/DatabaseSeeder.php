<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SuperadminsTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(InstituicoesTableSeeder::class);
        $this->call(MensagensTableSeeder::class);
        $this->call(TiposDeAcoesTableSeeder::class);

    }
}
