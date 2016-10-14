<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'Administrator';
        $admin->slug = 'administrator';
        $admin->description = '';
        $admin->level= 3;
        $admin->save();

        $teacher = new Role();
        $teacher->name = 'Teacher';
        $teacher->slug = 'teacher';
        $teacher->description = '';
        $teacher->level= 2;
        $teacher->save();

        $student = new Role();
        $student->name = 'Student';
        $student->slug = 'student';
        $student->description = '';
        $student->level= 1;
        $student->save();
    }
}
