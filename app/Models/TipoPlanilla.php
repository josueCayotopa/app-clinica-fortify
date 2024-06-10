<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPlanilla extends Model
{
    use HasFactory;
   
    protected $table = 'tipo_planillas';

    
    protected $primaryKey = 'CODIGO';

   
    public $incrementing = false;


    protected $keyType = 'string';

  
    public $timestamps = true;

 
    protected $fillable = [
        'CODIGO',
        'CODIGO_EMPRESA',
        'DES_TIPO_PLANILLA',
        'TIP_PROC_SEMA',
        'TIP_PROCESO',
        'NUM_VER_PLAN_CUENTAS',
        'COD_CUENTA_CARGO',
        'IND_REDONDEO',
        'TIP_REDONDEO',
        'IND_DER_PLANILLA',
        'IMP_TOPE_PRESTAMO',
        'NUM_PORC_ADELA_QUINCE',
        'TIP_APLICA_PRESTAMO'
    ];

   
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'CODIGO_EMPRESA');
    }

    public function conceptosCuentas()
    {
        return $this->belongsTo(ConceptosCuentas::class, 'NUM_VER_PLAN_CUENTAS', 'CODIGO');
    }
}
