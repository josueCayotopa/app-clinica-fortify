<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConceptoSunat extends Model
{
    use HasFactory;
    protected $table = 'concepto_sunats';

    protected $fillable = [
        'codigo',
        'descripcion',
        'essalud_seguro_regular_trabajador',
        'essalud_cbssp_seg_trab_pesquero',
        'essalud_seguro_agrario_acuicultor',
        'essalud_sctr',
        'impuesto_extraord_de_solidaridad',
        'fondo_derechos_sociales_del_artista',
        'senati',
        'sistema_nacional_de_pensiones_1999',
        'sistema_privado_de_pensiones',
        'renta_5ta_categoría_retenciones',
        'essalud_seguro_regular_pensionista',
        'contrib_solidaria_asistencia_previs',
    ];
    public function concepto_sunat()
    {
        return $this->hasMany(Trabajador::class, 'concepto_sunat_id');
    }

}
