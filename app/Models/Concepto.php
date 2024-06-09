<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    use HasFactory;
    protected $primaryKey = 'COD_CONCEPTO';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'COD_CONCEPTO',
        'COD_EMPRESA',
        'DES_NOMBRE',
        'DES_NOMBRE_CORTO',
        'NUM_VER_PLAN_CUENTAS',
        'TIP_CONCEPTO',
        'COD_CUENTA_CARGO',
        'TIP_OPERACION',
        'IND_FORMULA',
        'COD_CUENTA_ABONO',
        'COD_FORMULA',
        'NUM_GRUPO',
        'TIP_RENTA_QTACAT',
        'TIP_APLICACION',
        'IND_GRATIFICA',
        'COD_MONEDA_DEFAULT',
        'IND_RECIBE_CONCEPTO',
        'TIP_CTS',
        'TIP_INGRESO',
        'TIP_AUTO_MAN',
        'IND_TOTAL',
        'COD_CONCEPTO_ORIGEN',
        'COD_USER_ACTUAL',
        'IND_GRATI_SEM',
        'CTA_CARGO_SALARIO',
        'CTA_ABONO_SALARIO',
        'IND_UTILIDADES',
        'COD_SUNAT',
        'DES_NOMBRE_SUNAT',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'COD_EMPRESA', 'id');
    }

    public function monedaDefault()
    {
        return $this->belongsTo(Tipo_moneda::class, 'COD_MONEDA_DEFAULT', 'id');
    }
}
