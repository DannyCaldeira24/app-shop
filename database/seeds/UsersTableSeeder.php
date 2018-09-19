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
        User::create([
            'name'=>'Admin',
            'surname'=>'Test',
            'direction'=>'Hello word',
            'postal_code'=>'1111',
            'email'=>'admin@example.com',
            'password'=>bcrypt('123123'),
            'admin'=>false
        ]);
        User::create([
            'name'=>'Clara Josefina',
            'surname'=>'Lozano Lipez',
            'direction'=>'Madrid-España',
            'postal_code'=>'1095',
            'email'=>'danny_elportu@hotmail.com',
            'password'=>bcrypt('123123'),
            'admin'=>false
        ]);
    }
}
