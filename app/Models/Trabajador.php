<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    use HasFactory;
    protected $table = 'trabajadors';
    protected $fillable = [
        'tipo_trabajador_id',
        'regimen_laboral',
        'nivel_edicativo_id',
        'ocupacion_id',
        'categoria_cargo_id',
        'discapacidad',
        'regimen_pencionario_id',
        'fecha_inscripcion_regimen',
        'CUSPP',
        'sctrsalud_id',
        'sctrpension_id',
        'contrato_trabajo_id',
        'trabajo_sujeto_alt_acum_atip_desc',
        'trabajo_sujeto_jornda_maxima',
        'trabajo_sujeto_horario_noctur',
        'ingresos_quinta_categoria',
        'sindicalizado',
        'periodicidad_id',
        'afiliado_eps_servicios_propios',
        'eps_id',
        'situacion_id',
        'renta_quinta_categoria',
        'situacion_trabajador_id',
        'tipo_pago_id',
        'tipo_banco_id',
        'numero_bancaria',
        'monto_pago',
        'afilacion_asegura_pension',
        'categoria_ocupacional_id',
        'convenio_id',
        'periodo_laboral_id',
        'otros_empleadores',
        'derechohabientes',
        'jornada_laboral_id',
        'dias_subcidiado_id',
        'dias_no_subcidiado_id',
        'sucursal_establecimiento_laboral_id',
        'remuneracion_id'
    ];

    public function tipoTrabajador()
    {
        return $this->belongsTo(Tipo_trabajador::class,'tipo_trabajador_id' );
    }

    public function nivelEducativo()
    {
        return $this->belongsTo(Nivel_educativo::class, 'nivel_edicativo_id');
    }

    public function ocupacion()
    {
        return $this->belongsTo(Ocupacion::class, 'ocupacion_id');
    }

    public function categoriaCargo()
    {
        return $this->belongsTo(CategoriaCargo::class, 'categoria_cargo_id');
    }

    public function regimenPencionario()
    {
        return $this->belongsTo(RegimenPencionario::class, 'regimen_pencionario_id');
    }

    public function sctrSalud()
    {
        return $this->belongsTo(Sctrsalud::class, 'sctrsalud_id');
    }

    public function sctrPension()
    {
        return $this->belongsTo(Sctrpension::class,'sctrpension_id');
    }
    public function contratoTrabajo()
    {
        return $this->belongsTo(TipoContratosTrabajo::class, 'contrato_trabajo_id');
    }

    public function periodicidad()
    {
        return $this->belongsTo(Periodicidad::class, 'periodicidad_id');
    }

    public function eps()
    {
        return $this->belongsTo(EPS::class, 'eps_id');
    }

    public function situacion()
    {
        return $this->belongsTo(SituacionEPS::class, 'situacion_id');
    }

    public function situacionTrabajador()
    {
        return $this->belongsTo(SituacionTrabajador::class, 'situacion_trabajador_id');
    }

    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class, 'tipo_pago_id');
    }

    public function tipoBanco()
    {
        return $this->belongsTo(TipoBanco::class,'tipo_banco_id' );
    }

    public function categoriaOcupacional()
    {
        return $this->belongsTo(CategoriaOcupacional::class, 'categoria_ocupacional_id');
    }

    public function convenio()
    {
        return $this->belongsTo(Convenio::class, 'convenio_id');
    }

    public function periodoLaboral()
    {
        return $this->belongsTo(PeriodoLaboral::class, 'periodo_laboral_id');
    }
    public function jornadaLaboral()
    {
        return $this->belongsTo(JornadaLaboral::class,'jornada_laboral_id' );
    }
    public function diasSubcidiado()
    {
        return $this->belongsTo(DiasSubcidiados::class, 'dias_subcidiado_id');
    }
    public function diasNoSubcidiado()
    {
        return $this->belongsTo(DiasNoSubcidiados::class,'dias_no_subcidiado_id');
    }
    public function sucursalEstablecimientoLaboral()
    {
        return $this->belongsTo(SucursalEstablecimientoLaboral::class, 'sucursal_establecimiento_laboral_id');
    }
    public function remuneracion()
    {
        return $this->belongsTo(Remuneracion::class, 'remuneracion_id' );
    }
}
