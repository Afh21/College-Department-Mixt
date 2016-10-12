<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "countries";

    protected $fillable = ['country_code', 'country_name'];

    // Relaciones

    public function departments(){
        return $this->hasMany('App\Departments', 'country_id');
    }

}
