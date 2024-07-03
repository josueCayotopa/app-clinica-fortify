<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosPersonal extends Model
{
    use HasFactory;
    protected $table = 'datos_personals';

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
        'imagen',
        'curriculum',
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
        'trabajador_id',
        'pensionista_id',
        'trabajador_cuarta_categoria_id',
        'modaliad_formativa_id',
    
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
    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class, 'trabajador_id');
    }
    public function pensionista()
    {
        return $this->belongsTo(Pensionista::class, 'pensionista_id');
    }
    public function trabajador_cuarta_categoria()
    {
        return $this->belongsTo(TrabajadorCuartaCategoria::class, 'trabajador_cuarta_categoria_id');
    }
    public function modaliad_formativa()
    {
        return $this->belongsTo(ModaliadFormativa::class, 'modaliad_formativa_id');
    }


}
