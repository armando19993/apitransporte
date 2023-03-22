<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_apellido',
        'dni',
        'celular',
        'anios_exp;eriencia',
        'numero_licencia',
    ];
}
