<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = [
        'user_id','turno','fecha','hora'
    ];

    protected $dates = [
        'fecha'
    ];

    public function usuario(){
        return $this->belongsTo('App/User');
    }
}
