<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pensionista extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo_documento_id',
        'numero_documento',
        'tipo_trabajador_id',
        'regimen_pencionario_id',
        'fecha_inscirpcion',
        'cuspp',
        'situacion_e_p_s_id',
        'tipo_pago_id',
    ];

    // Definir las relaciones
 
    public function tipoTrabajador()
    {
        return $this->belongsTo(Tipo_trabajador::class);
    }

    public function regimenPencionario()
    {
        return $this->belongsTo(RegimenPencionario::class);
    }

    public function situacionEPS()
    {
        return $this->belongsTo(SituacionEPS::class);
    }

    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class);
    }


}
