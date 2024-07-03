<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacionEPS extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo_sunat',
        'descripcion',
        'afiliado_eps',
        'estado'
    ];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'situacion_id');
    }
}
