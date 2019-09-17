<?php
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new App\Admin;
        $admin->name = 'Leonardo Almeida';
        $admin->email = 'leonardo.almeida@metodista.br';
        $admin->password = bcrypt('psw');
        $admin->remember_token = str_random(10);
        $admin->save();

        $admin = new App\Admin;
        $admin->name = 'Thiago Tamosauskas';
        $admin->email = 'thiago.tamosauskas@metodista.br';
        $admin->password = bcrypt('psw');
        $admin->remember_token = str_random(10);
        $admin->save();

        $admin = new App\Admin;
        $admin->name = 'Erick Firmo';
        $admin->email = 'erick.serrano@metodista.br';
        $admin->password = bcrypt('psw');
        $admin->remember_token = str_random(10);
        $admin->save();

        $admin = new App\Admin;
        $admin->name = 'Fernando Zancopé';
        $admin->email = 'fernando.zancope@metodista.br';
        $admin->password = bcrypt('psw');
        $admin->remember_token = str_random(10);
        $admin->save();
    }
}