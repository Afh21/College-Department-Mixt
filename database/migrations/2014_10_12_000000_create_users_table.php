<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_type', 2); // RC, TI, CC, PS
            $table->string('user_identity', 15)->unique(); // Number CC
            $table->string('name', 50);
            $table->string('user_lastname', 80);
            $table->string('email')->unique();
            $table->string('password');

            $table->string('user_genre', 1); // F (Female) - M (Male)
            $table->date('user_birthday')->nullable();
            $table->tinyInteger('user_age')->nullable();
            $table->string('user_address', 150)->nullable();
            $table->string('user_phone', 15)->unique()->nullable();
            $table->string('user_blood', 3)->nullable(); // RH O+ O- A+ A-
            $table->enum('user_state', ['enabled', 'disabled'])->default('enabled'); // Active, Desactive
            $table->boolean('user_director')->default(false);  // Profesor, ¿director de grupo?
            $table->string('user_profession', 100)->nullable();// Ej: Ing. Industrial, Lic. Matematicas.
            $table->rememberToken();
            $table->timestamps();
        });
    }

    // Falta completar la migracion para los usuarios e instalar los roles

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
