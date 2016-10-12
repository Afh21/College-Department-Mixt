<?php

use Illuminate\Database\Seeder;
use App\Country;
use App\Departments;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::where('country_code', '57')->first();

        $country->departments()->saveMany([
            new Departments(['dept_code' => '05', 'dept_name' => 'Antioquia']),
            new Departments(['dept_code' => '91', 'dept_name' => 'Amazonas']),
            new Departments(['dept_code' => '08', 'dept_name' => 'Atlantico']),
            new Departments(['dept_code' => '81', 'dept_name' => 'Arauca']),
            new Departments(['dept_code' => '11', 'dept_name' => 'Bogota']),
            new Departments(['dept_code' => '13', 'dept_name' => 'Bolivar']),
            new Departments(['dept_code' => '15', 'dept_name' => 'Boyaca']),
            new Departments(['dept_code' => '17', 'dept_name' => 'Caldas']),
            new Departments(['dept_code' => '18', 'dept_name' => 'Caqueta']),
            new Departments(['dept_code' => '85', 'dept_name' => 'Casanare']),
            new Departments(['dept_code' => '19', 'dept_name' => 'Cauca']),
            new Departments(['dept_code' => '20', 'dept_name' => 'Cesar']),
            new Departments(['dept_code' => '27', 'dept_name' => 'Choco']),
            new Departments(['dept_code' => '23', 'dept_name' => 'Cordoba']),
            new Departments(['dept_code' => '25', 'dept_name' => 'Cundinamarca']),
            new Departments(['dept_code' => '94', 'dept_name' => 'Guainia']),
            new Departments(['dept_code' => '95', 'dept_name' => 'Guaviare']),
            new Departments(['dept_code' => '41', 'dept_name' => 'Huila']),
            new Departments(['dept_code' => '44', 'dept_name' => 'La Guajira']),
            new Departments(['dept_code' => '47', 'dept_name' => 'Magdalena']),
            new Departments(['dept_code' => '50', 'dept_name' => 'Meta']),
            new Departments(['dept_code' => '52', 'dept_name' => 'Nariño']),
            new Departments(['dept_code' => '54', 'dept_name' => 'Norte de Santander']),
            new Departments(['dept_code' => '86', 'dept_name' => 'Putumayo']),
            new Departments(['dept_code' => '63', 'dept_name' => 'Quindio']),
            new Departments(['dept_code' => '66', 'dept_name' => 'Risaralda']),
            new Departments(['dept_code' => '88', 'dept_name' => 'San Andres']),
            new Departments(['dept_code' => '68', 'dept_name' => 'Santander']),
            new Departments(['dept_code' => '70', 'dept_name' => 'Sucre']),
            new Departments(['dept_code' => '73', 'dept_name' => 'Tolima']),
            new Departments(['dept_code' => '76', 'dept_name' => 'Valle del Cauca']),
            new Departments(['dept_code' => '97', 'dept_name' => 'Vaupes']),
            new Departments(['dept_code' => '99', 'dept_name' => 'Vichada'])
        ]);
    }
}
