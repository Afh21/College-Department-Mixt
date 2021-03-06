<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(CountryTableSeeder::class);
        //$this->call(DepartmentTableSeeder::class);
        //$this->call(TownTableSeeder::class);
        $this->call(PeriodTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
