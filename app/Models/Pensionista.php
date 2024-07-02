<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pensionista extends Model
{
    protected $table = 'pencionistas';
    use HasFactory;
    protected $fillable = [
        'tipo_documento_id', 
        'tipo_pensionista_id', 
        'numero_documento',
        'tipo_trabajador_id', 
        'regimen_pencionario_id', 
        'fecha_inscirpcion',
        'cuspp',
        'situacion_e_p_s_id', 
        'tipo_pago_id', 
        'tipo_banco_id', 
        'numero_bancaria',
        'monto_pago',
        'periodo_laboral_id', 
        'derechohabientes',
        'remuneracion_pencionista_id', 
        'sucursal_establecimiento_laboral_id', 

    ];

    // Definir las relaciones
    public function tipoPensionista()
    {
        return $this->belongsTo(Tipo_trabajador::class);
    }

    public function regimenPencionario()
    {
        return $this->belongsTo(RegimenPencionario::class);
    }
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class);
    }


    

    public function situacionEPS()
    {
        return $this->belongsTo(SituacionEPS::class);
    }

    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class);
    }
    public function tipoBanco()
    {
        return $this->belongsTo(TipoBanco::class);
    }

    public function sucursalEstablecimientoLaboral()
    {
        return $this->belongsTo(SucursalEstablecimientoLaboral::class);
    }
    public function periodoLaboral()
    {
        return $this->belongsTo(PeriodoLaboral::class);
    }

    public function remuneracionPencionista()
    {
        return $this->belongsTo(RemuneracionPencionista::class);
    }
    

    
}
