<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EPS extends Model
{
    use HasFactory;
    protected $fillable = [
        'ruc',
        'descripcion',
        'estado'
    ];
    
    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'eps_id');
    }
}
