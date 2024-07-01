<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiasSubcidiados extends Model
{
    use HasFactory;
    protected $fillable = [
        'trabajador_id',
        'tipo_suspencion_id',
        'fecha_inicio',
        'fecha_fin'
    ];

    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'trabajador_id');
    }

    public function tipoSuspension()
    {
        return $this->belongsTo(TipoSuspension::class, 'tipo_suspencion_id');
    }
}
