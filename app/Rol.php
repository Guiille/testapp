<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //Relación de uno a muchos
    public function usuario(){
        return $this->belongsTo('App\Usuario');
    }

    //Relación de muchos a uno
    public function permiso(){
        return $this->belongsTo('App\Permiso');
    }
}
