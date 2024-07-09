<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'empresa_id', 'tipo_trabajador_id', 'codigo_sunat', 
        'descripcion', 'ind_directivo', 'estado'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'tipo_trabajador_id');
    }

    public function tipoTrabajador()
    {
        return $this->belongsTo(Tipo_Trabajador::class,'tipo_trabajador_id');
    }
    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'ocupacion_id');
    }
}
