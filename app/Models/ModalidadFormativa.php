<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalidadFormativa extends Model
{
    use HasFactory;
    protected $fillable = [
        'seguro_medico_id',
        'nivel_educativo_id',
        'ocupacion_id',
        'madre_responsabilidad',
        'discapacidad',
        'institucion_id',
        'horario_nocturno',
        'tipo_pago_id',
        'tipo_banco_id',
        'numero_bancaria',
        'monto_pago',
        'periodo_laboral_id',
        'jornada_laboral_id',
        'dias_subcidiado_id',
        'dias_no_subcidiado_id',
        'sucursal_establecimiento_laboral_id',
    ];

    public function seguroMedico()
    {
        return $this->belongsTo(SeguroMedico::class, 'seguro_medico_id');
    }

    public function nivelEducativo()
    {
        return $this->belongsTo(Nivel_educativo::class, 'nivel_educativo_id');
    }

    public function ocupacion()
    {
        return $this->belongsTo(Ocupacion::class, 'ocupacion_id');
    }

    public function institucion()
    {
        return $this->belongsTo(Institucion::class, 'institucion_id');
    }

    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class, 'tipo_pago_id');
    }

    public function tipoBanco()
    {
        return $this->belongsTo(TipoBanco::class, 'tipo_banco_id');
    }

    public function periodoLaboral()
    {
        return $this->belongsTo(PeriodoLaboral::class, 'periodo_laboral_id');
    }

    public function jornadaLaboral()
    {
        return $this->belongsTo(JornadaLaboral::class, 'periodo_laboral_id');
    }

    public function diasSubcidiado()
    {
        return $this->belongsTo(DiasSubcidiados::class);
    }

    public function diasNoSubcidiado()
    {
        return $this->belongsTo(DiasNoSubcidiados::class);
    }

    public function sucursalEstablecimientoLaboral()
    {
        return $this->belongsTo(SucursalEstablecimientoLaboral::class, 'sucursal_establecimiento_laboral_id');
    }
}
