<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $table = 'departments';

    protected $fillable = ['dept_code', 'dept_name', 'country_id'];

    public function country(){
        return $this->belongsTo('App\Country');
    }

    public function towns(){
        return $this->hasMany('App\Town', 'dept_id');
    }
    
}
