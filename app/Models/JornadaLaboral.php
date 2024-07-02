<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JornadaLaboral extends Model
{
    use HasFactory;
    protected $fillable = [
        'horas_trabajadas',
        'minutos_trabajados',
        'horas_sobretiempo',
        'minutos_sobretiempo'
    ];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'jornada_laboral_id');
    }
}
