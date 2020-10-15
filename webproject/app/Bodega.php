<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'responsable',
        'correo',
        'ciudad',
        'estado',
        'id_usuario',
    ];
}
