<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'correo',
        'rol_id',
    ];

    // Relación de un solo Rol
    public function rols(){
        return $this->hasOne('App\Rol');
    }
}
