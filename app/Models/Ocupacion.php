<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo_sunat',
        'descripcion',
        'estado'
    ];
    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'ocupacion_id');
    }
}
