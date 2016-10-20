<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_code', 3); // Ej: 100, 101, 103 ...
            $table->string('group_name', 5); // Ej: 1A, 2B, 4D ...
            $table->integer('group_quantity'); // Cantidad del grupo
            $table->string('group_jornade', 2); // Ej: AM - PM
            $table->boolean('group_assigned')->default(false);

            // Se activa solo para profores (Relacion - director() )
            $table->integer('user_teacher_director', false, true)->nullable();
            $table->foreign('user_teacher_director')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('groups');
    }
}
