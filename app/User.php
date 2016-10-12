<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'country_id', 'department_id','town_id'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    // Relaciones

    public function countries(){
        return $this->belongsTo('App\Country');
    }

    public function departments(){
        return $this->belongsTo('App\Departments');
    }

    public function towns(){
        return $this->belongsTo('App\Town');
    }


}
