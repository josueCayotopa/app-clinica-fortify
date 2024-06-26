<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
   //

   use HasFactory;


  
    protected $fillable = [
        'empresa_id',
        'codigo',
        'descripcion', 
        'nivel',
        'factor_hora_extra',
        'factor_dia_viaje',
    ];

    public function cargos()
    {
        return $this->belongsToMany(Cargo::class, 'categoria_cargo');
    }
    public function empresas()
    {
        return $this->belongsToMany(Empresa::class, 'empresa_id');
    }

        
        

}
