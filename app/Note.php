<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';

    protected $fillable = ['user_id', 'group_id', 'math_id', 'period_id', 'note'];

    // Relaciones
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function math(){
        return $this->belongsTo('App\Math');
    }

    public function period(){
        return $this->belongsTo('App\Period');
    }

    // Falta las relaciones inversas
}
