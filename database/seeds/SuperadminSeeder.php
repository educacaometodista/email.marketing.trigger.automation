<?php
use Illuminate\Database\Seeder;

class SuperadminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = new App\Superadmin;
        $superadmin->name = 'Erick Firmo';
        $superadmin->email = 'erick.serrano@metodista.br';
        $superadmin->password = bcrypt('*Secret2019');
        $superadmin->remember_token = str_random(10);
        $superadmin->save();
    }

}