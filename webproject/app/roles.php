<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $fillable =[
        'nombre',
        'descripcion',
        'estado',
    ];
}
