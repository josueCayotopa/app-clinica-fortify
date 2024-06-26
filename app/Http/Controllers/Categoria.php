<?php

namespace App\Http\Controllers;

use App\Models\CargosCategorias;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Categoria extends Controller
{
    //

    use HasFactory;

    protected $fillable = [
        'empresa_id', 'codigo', 'descripcion', 'nivel', 'factor_hora_extra', 'factor_dia_viaje'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function cargosCategorias()
    {
        return $this->hasMany(CargosCategorias::class);
    }
}
