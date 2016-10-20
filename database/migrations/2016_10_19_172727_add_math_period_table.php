<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMathPeriodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('math_period', function(Blueprint $table){
            $table->increments('id');

            $table->integer('math_id', false, true);
            $table->foreign('math_id')->references('id')->on('maths')->onDelete('cascade');

            $table->integer('period_id', false, true);
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade');

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
        Schema::drop('math_period');
    }
}
