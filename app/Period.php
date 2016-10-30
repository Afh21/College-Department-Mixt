<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    protected $table = 'periods';

    protected $fillable = ['period_name'];

    // Relaciones

    //Muchos a Muchos - Materias & Periodos
    public function maths(){
        return $this->belongsToMany('App\Math', 'math_period', 'period_id', 'math_id');
    }

    public function Notes(){
        return $this->hasMany('App\Note');
    }

}
