<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sedes extends Model
{
    protected $fillable = [
        'nombre',
        'correo',
        'direccion',
        'estado',
        'ciudad',
        'id_usuario',
    ];
}
