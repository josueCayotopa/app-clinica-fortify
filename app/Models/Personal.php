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
        'nivel_educativo_id',
        'ocupacion_id',
        'discapacidad',
        'regimen_pensionario_id',
        'fecha_inscripcion_regimen',
        'CUSPP',
        'SCTR_salud',
        'SCTR_pension',
        'contrato_trabajo_id',
        'trabajo_sujeto_alt_acum_atip_desc',
        'trabajo_sujeto_jornada_maxima',
        'trabajo_sujeto_horario_nocturno',
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
        'convenio_id',
    ];
}
