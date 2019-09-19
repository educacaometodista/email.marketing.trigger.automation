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
        $admin->foto_de_perfil = 'https://avatars3.githubusercontent.com/u/42948574?s=460&v=4';
        $admin->password = bcrypt('psw');
        $admin->remember_token = str_random(10);
        $admin->save();

        $admin = new App\Admin;
        $admin->name = 'Thiago Tamosauskas';
        $admin->email = 'thiago.tamosauskas@metodista.br';
        $admin->foto_de_perfil = 'https://avatars2.githubusercontent.com/u/12496600?s=460&v=4';
        $admin->password = bcrypt('psw');
        $admin->remember_token = str_random(10);
        $admin->save();

        $admin = new App\Admin;
        $admin->name = 'Erick Firmo';
        $admin->email = 'erick.serrano@metodista.br';
        $admin->foto_de_perfil = 'https://avatars3.githubusercontent.com/u/34639603?s=460&v=4';
        $admin->password = bcrypt('psw');
        $admin->remember_token = str_random(10);
        $admin->save();

        $admin = new App\Admin;
        $admin->name = 'Fernando Zancopé';
        $admin->email = 'fernando.zancope@metodista.br';
        $admin->foto_de_perfil = 'https://avatars0.githubusercontent.com/u/53548067?s=460&v=4';
        $admin->password = bcrypt('psw');
        $admin->remember_token = str_random(10);
        $admin->save();
    }
}