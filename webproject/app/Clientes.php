<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = [
        'documento',
        'nombre',
        'apellido',
        'correo',
        'direccion',
        'telefono',
        'estado',
        'id_usuario',
    ];
}
