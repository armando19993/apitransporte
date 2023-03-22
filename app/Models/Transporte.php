<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_placa',
        'soat',
        'estado',
        'codigo_etiqueta_nfc',
        'idConsesionaria',
        'idConductor',
    ];
}
