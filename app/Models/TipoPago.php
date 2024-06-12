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

    public function personals()
    {
        return $this->hasMany(Personal::class, 'tipo_pago_id');
    }
}
