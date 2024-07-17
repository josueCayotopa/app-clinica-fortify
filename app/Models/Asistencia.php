<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = [
        'fecha',
        'hora_entrada',
        'hora_salida',
        'trabajador_id',
    ];

    /**
     * Relación con el modelo Trabajador (DatosPersonals).
     */
    public function trabajador()
    {
        return $this->belongsTo(DatosPersonal::class, 'trabajador_id');
    }
}
