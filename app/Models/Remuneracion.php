<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remuneracion extends Model
{
    use HasFactory;
    protected $table = 'remuneracions';

    protected $fillable = [
        'concepto_sunat_id',
        'monto_devengado',
        'monto_pagado',
    ];

    // Relación con ConceptoSunat
    public function conceptoSunat()
    {
        return $this->belongsTo(ConceptoSunat::class, 'concepto_sunat_id');
    }
    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'remuneracion_id');
    }

    
}
