<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        // Agrega aquí las demás columnas de la tabla "tipo_documentos"
    ];
}
