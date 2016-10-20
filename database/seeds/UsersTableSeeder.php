<?php

use Illuminate\Database\Seeder;
use App\Town;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdm = Role::where('name', 'Administrator')->first();

        $user = new User();
        $user->user_type        = 'CC';
        $user->user_identity    = '1010205446';
        $user->name             = 'Andres Felipe';
        $user->user_lastname    = 'Hoyos Arboleda';
        $user->email            = 'andres_felipe0929@hotmail.com';
        $user->password         = bcrypt('123456');
        $user->user_genre       = 'M';
        $user->user_birthday    = '1992/09/29';
        $user->user_age         = 24;
        $user->user_address     = 'Cl 8 N° 8-12';
        $user->user_phone       = '3217475841';
        $user->user_blood       = 'O+';
        $user->user_profession  = 'Ing. Electronico';
        $user->user_country     = 'Colombia';
        $user->user_department  = 'Caldas';
        $user->user_town        = 'La Dorada';

        $user->save();
        $user->attachRole($roleAdm);

    }
}
