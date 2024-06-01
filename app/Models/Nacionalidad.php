<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nacionalidad extends Model
{
    protected $table = 'nacionalidad';
    use HasFactory;
    protected $fillable = [
        'codigo',
        'descripcion',
    ];
    public function empresas()
    {
        return $this->hasMany(Empresa::class, 'pais_id');
    }
}
