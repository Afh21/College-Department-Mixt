<?php

use Illuminate\Database\Seeder;
use App\Town;
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
        $town    = Town::find(1);

        $user = new User();
        $user->name     = 'Andres Felipe';
        $user->email    = 'andres_felipe0929@hotmail.com';
        $user->password = bcrypt('123456');

        $town->TownsUsers()->save($user);

        $user->save();
    }
}
