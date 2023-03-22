<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consesionaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ruc',
        'email',
    ];
}
