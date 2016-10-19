<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Bican\Roles\Traits\HasRoleAndPermission;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Authenticatable implements HasRoleAndPermissionContract
{
    use HasRoleAndPermission;

    protected $guarded = [
        'user_state', 'user_director'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    // Relaciones

    public function town(){
        return $this->belongsTo('App\Town');
    }

    public function roles(){
        return $this->belongsToMany('App\Role', 'role_user','user_id', 'role_id');
    }

}
