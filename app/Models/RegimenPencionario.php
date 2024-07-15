<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegimenPencionario extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo_sunat',
        'descripcion',
        'estado'

    ];
    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'regimen_pencionario_id');
        
        
    }
    public function afps()
    {
        return $this->hasMany(RegimenAfp::class);
    }
}
