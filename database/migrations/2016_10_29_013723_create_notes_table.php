<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('teacher_id', false, true)->nullable();
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('user_id', false, true)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('group_id', false, true)->nullable();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');

            $table->integer('math_id', false, true)->nullable();
            $table->foreign('math_id')->references('id')->on('maths')->onDelete('cascade');

            $table->integer('period_id', false, true)->nullable();
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade');

            $table->double('note');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('notes');
    }
}
