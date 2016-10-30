<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Math extends Model
{
    protected  $table = 'maths';

    protected $fillable = ['math_code', 'math_name'];

    //Relaciones

    // Muchos a Muchos - Materias & Grupos
    public function MathGroups(){
        return $this->belongsToMany('App\Group', 'group_math', 'math_id', 'group_id');
    }

    // Muchos a Muchos - Materias & Profesores (Users)
    public function MathTeachers(){
        return $this->belongsToMany('App\User', 'math_user', 'math_id', 'user_id');
    }

    // Muchos a Muchos - Materias & Periodos
    public function periods(){
        return $this->belongsToMany('App\Period', 'math_period', 'math_id', 'period_id');
    }

    public function Notes(){
        return $this->hasMany('App\Note');
    }
}
