<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSuspension extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo_sunat',
        'descripcion',
        'estado'
    ];

    public function diasSubcidiados()
    {
        return $this->hasMany(DiasSubcidiados::class,'tipo_suspencion_id');
    }

    public function diasNoSubcidiados()
    {
        return $this->hasMany(DiasNoSubcidiados::class,'tipo_suspencion_id');
    }
}
