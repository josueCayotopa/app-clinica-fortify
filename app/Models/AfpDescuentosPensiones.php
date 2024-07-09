<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AfpDescuentosPensiones extends Model
{
    use HasFactory;
    protected $fillable = ['afp_id', 'descuento_id', 'tipo_comision', 'fecha', 'porcentaje', 'importe_tope'];

    public function afp()
    {
        return $this->belongsTo(RegimenAfp::class, 'afp_id');
    }

    public function descuento()
    {
        return $this->belongsTo(DescuentoRegimemPencionario::class, 'descuento_id');
    }
}
