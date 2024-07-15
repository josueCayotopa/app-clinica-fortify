<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_trabajador extends Model
{
    use HasFactory;
    protected $fillable = [
        'empresa_id', 'codigo_sunat', 'descripcion', 'nivel', 
        'factor_hora_extra', 'factor_dia_viaje', 'estado'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class,'empresa_id' );
    }

    public function ocupaciones()
    {
        return $this->hasMany(Ocupacion::class,'tipo_trabajador_id' );
    }

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class,'tipo_trabajador_id');
    }
    
}
