<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaMeDestacan extends Model
{
    use HasFactory;
    protected $table = 'empresa_me_destacans';

    // Especifica los atributos que se pueden asignar en masa
    protected $fillable = [
        'razon_social',
        'direccion',
        'nombre_comercial',
        'ruc_empresa',
        'codigo_actividad_id'
    ];

    // Define la relación con el modelo TipoDeActividad
    public function tipoDeActividad()
    {
        return $this->belongsTo(Tipo_de_Actividad::class, 'codigo_actividad_id');
    }

}
