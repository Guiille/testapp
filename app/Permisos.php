<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    //Relación de uno a muchos
    public function permisos(){
        return hasMany->('App\Permisos')
    }
}
