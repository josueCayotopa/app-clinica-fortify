<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodoLaboral extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoria_periodos_id',
        'fecha_inicio',
        'fecha_fin',
        'motivo_fin_id',
        'estado',
    ];

    public function categoriaPeriodo()
    {
        return $this->belongsTo(CategoriaPeriodo::class, 'categoria_periodos_id');
    }

    public function motivoFin()
    {
        return $this->belongsTo(MotivoFinPeriodo::class, 'motivo_fin_id');
    }

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'periodo_laboral_id');
    }
}
