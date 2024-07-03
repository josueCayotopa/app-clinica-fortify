<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiasNoSubcidiados extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo_suspencion_id',
        'fecha_inicio',
        'fecha_fin',
    ];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'dias_no_subcidiado_id');
    }

    public function tipoSuspencion()
    {
        return $this->belongsTo(TipoSuspension::class, 'tipo_suspencion_id');
    }
}
