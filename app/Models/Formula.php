<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    use HasFactory;
    protected $primaryKey = 'codigo'; // Definir la clave primaria personalizada
    public $incrementing = false; // Indicar que la clave primaria no es autoincremental
    protected $keyType = 'string'; // Definir el tipo de dato de la clave primaria

    protected $fillable = [
        'codigo',
        'descripcion',
    ];
}
