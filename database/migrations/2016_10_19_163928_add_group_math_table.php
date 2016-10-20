<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGroupMathTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_math', function(Blueprint $table){
            $table->increments('id');

            $table->integer('group_id', false, true);
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');

            $table->integer('math_id', false, true);
            $table->foreign('math_id')->references('id')->on('maths')->onDelete('cascade');

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
        Schema::drop('group_math');
    }
}
