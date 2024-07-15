<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DerechoHabientes extends Model
{
    use HasFactory;
    protected $table = 'derecho_habientes';

    protected $fillable = [
        'trabajador_id',
        'tipo_documento_id',
        'nombre_completo',
        'numero_documento',
        'fecha_nacimiento',
        'sexo',
        'vinculo_familiar_id',
        'documento_acredita_parternidad_id',
        'numero_documento_acredita_paternidad',
        'situacion',
        'fecha_alta',
        'tipo_baja_id',
        'fecha_baja',
        'numero_resolucion',
        'domicilio_id',
        'telefono',
        'correo_electronico',
        'via_id',
        'nombre_via',
        'numero_via',
        'interior',
        'zona_id',
        'nombre_zona',
        'referencia',
        'distrito_id',
    ];

    // Relaciones con otros modelos
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

    public function trabajador()
    {
        return $this->belongsTo(DatosPersonal::class, 'trabajador_id');
    }

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }

    public function vinculoFamiliar()
    {
        return $this->belongsTo(VinculoFamiliar::class, 'vinculo_familiar_id');
    }

    public function documentoAcreditaParternidad()
    {
        return $this->belongsTo(DocumentoAcreditaParternidad::class, 'documento_acredita_parternidad_id');
    }

    public function tipoBaja()
    {
        return $this->belongsTo(MotivoBajaDH::class, 'tipo_baja_id');
    }

    public function domicilio()
    {
        return $this->belongsTo(DomicioDerechoHbientes::class, 'domicilio_id');
    }
}
