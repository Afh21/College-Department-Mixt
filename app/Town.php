<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $table = 'towns';

    protected $fillable = ['town_code' , 'town_name', 'dept_id'];


    public function TownsUsers(){
        return $this->hasMany('App\User', 'town_id');
    }

    public function department(){
        return $this->belongsTo('App\Departments');
    }

}
