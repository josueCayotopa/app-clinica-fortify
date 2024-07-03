<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPago extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'estado'
    ];

    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class,'tipo_pago_id');
    }

}
