<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provedores extends Model
{
    protected $fillable = [
        'nombre',
        'contacto',
        'direccion',
        'correo',
        'telefono',
        'estado',
        'ciudad_id',
        'user_id',
    ];
}
