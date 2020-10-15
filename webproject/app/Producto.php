<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'referencia',
        'descripcion',
        'minstock',
        'maxstock',
        'preciocosto',
        'precioventa',
        'porcentajeiva',
        'descuento',
        'estado',
        'marca_id',
        'tipo_id',
        'bodega_id',
        'categoria_id',
        'provedor_id',
        'users_id',
    ];
}
