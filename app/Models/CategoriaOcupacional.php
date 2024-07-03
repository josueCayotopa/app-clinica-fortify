<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaOcupacional extends Model
{
    use HasFactory;
    protected $table = 'categoria_ocupacionals';
    public $timestamps = true;
    protected $fillable = [
        'DESCRIPCION'
    ];
    
    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class,'categoria_ocupacional_id');
    }
}
