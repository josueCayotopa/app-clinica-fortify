<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_trabajador extends Model
{
    use HasFactory;
   protected $fillable = [
        'codigo_sunat',
        'descripcion',
        'estado'
    ];

    public function personals()
    {
        return $this->hasMany(Personal::class, 'tipo_trabajador_id');
    } 
    
}
