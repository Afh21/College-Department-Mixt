<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name', 'slug', 'description', 'level'];

    // Relaciones

    public function users(){
        return $this->belongsToMany('App\User', 'role_user', 'role_id', 'user_id');
    }
}
