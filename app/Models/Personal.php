<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $table = 'personals';

    protected $fillable = [
        'tipo_documento_id',
        'numero_documento',
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'fecha_nacimiento',
        'sexo',
        'nacionalidad_id',
        'telefono',
        'correo_electronico',
        'essalud_vida',
        'domiciliado',
        'via_id',
        'nombre_via',
        'numero_via',
        'interior',
        'zona_id',
        'nombre_zona',
        'referencia',
        'distrito_id',
        'tipo_trabajador_id',
        'regimen_laboral',
        'nivel_edicativo_id',
        'ocupacion_id',
        'discapacidad',
        'regimen_pencionario_id',
        'fecha_inscripcion_regimen',
        'CUSPP',
        'SCTR_salud',
        'SCTR_pension',
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
        'situacion_especial_trabajador',
        'tipo_pago_id',
        'afilacion_asegura_pension',
        'categoria_ocupacional_trabajador',
        'convenio_id'
    ];
    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

    public function via()
    {
        return $this->belongsTo(Via::class);
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class);
    }

    public function nacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class, 'pais_id');
    }

    public function tipoTrabajador()
    {
        return $this->belongsTo(Tipo_trabajador::class, 'tipo_trabajador_id');
    }

    public function nivelEducativo()
    {
        return $this->belongsTo(Nivel_educativo::class, 'nivel_edicativo_id');
    }

    public function ocupacion()
    {
        return $this->belongsTo(Ocupacion::class, 'ocupacion_id');
    }

    public function regimenPencionario()
    {
        return $this->belongsTo(RegimenPencionario::class, 'regimen_pencionario_id');
    }

    public function tipoContratoTrabajo()
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

    public function situacionEPS()
    {
        return $this->belongsTo(SituacionEPS::class, 'situacion_id');
    }

    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class, 'nivelEducativo');
    }

    public function convenio()
    {
        return $this->belongsTo(Convenio::class, 'convenio_id');
    }
}
