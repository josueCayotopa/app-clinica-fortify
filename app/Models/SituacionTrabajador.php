<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacionTrabajador extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
    ];


    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class,'situacion_trabajador_id');
    }
    
}
