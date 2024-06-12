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

    public function personals()
    {
        return $this->hasMany(Personal::class, 'situacion_id');
    }
}
