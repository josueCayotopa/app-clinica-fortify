<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JornadaLaboral extends Model
{
    use HasFactory;

    // Nombre de la tabla asociada
    protected $table = 'jornada_laborals';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'horas_trabajadas',
        'minutos_trabajados',
        'horas_sobretiempo',
        'minutos_sobretiempo',
        'descripcion',
        'numero_dias_semana',
        'hora_ingreso',
        'hora_salida'
    ];

    // Definir los tipos de los atributos
    protected $casts = [
        'horas_trabajadas' => 'integer',
        'minutos_trabajados' => 'integer',
        'horas_sobretiempo' => 'integer',
        'minutos_sobretiempo' => 'integer',
        'descripcion' => 'string',
        'numero_dias_semana' => 'integer',
        'hora_ingreso' => 'datetime:H:i:s',
        'hora_salida' => 'datetime:H:i:s'
    ];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'jornada_laboral_id');
    }
}
