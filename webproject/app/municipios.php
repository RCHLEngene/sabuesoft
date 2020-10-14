<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class municipios extends Model
{
    protected $fillable = [
        'municipio',
        'estado',
        'departamento_id ',
    ];
}
