<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_moneda extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion', 
        'des_abreviatura', 
        'estado'
    ];
    
    // Si es necesario, define la relación con el modelo Empresa
    public function empresas()
    {
        return $this->belongsToMany(Empresa::class);
    }
}
