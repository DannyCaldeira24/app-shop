<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name'=>'Danny Alejandro',
            'surname'=>'Caldeira Correia',
            'direction'=>'Av. Intercomunal El Valle Parroquia Coche. Residencias Venezuela',
            'postal_code'=>'1090',
        	'email'=>'dannyelportu2013@gmail.com',
        	'password'=>bcrypt('123123'),
            'admin'=>true
        ]);
    }
}
