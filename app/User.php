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

    // Para adjuntar roles a un usuario
    public function roles(){
        return $this->belongsToMany('App\Role', 'role_user','user_id', 'role_id');
    }

    // Se activa para adjuntar grupos a un profesor
    public function TeacherGroups(){
        return $this->belongsToMany('App\Group', 'group_user', 'user_id', 'group_id');
    }

    // Se activa para adjuntar las materias de un profesor
    public function TeacherMaths(){
        return $this->belongsToMany('App\Math', 'math_user', 'user_id', 'math_id');
    }

    // Se activa para (Director de grupo - Profesor)
    public  function TeacherDirector(){
        return $this->hasMany('App\Group', 'user_teacher_director');
    }

    // Se activa solo para estudiantes
    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function Notes(){
        return $this->hasMany('App\Note');
    }



}
