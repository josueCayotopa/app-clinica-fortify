<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosPs4ta extends Model
{
    use HasFactory;
    protected $fillable = [
        'tipo_documento_id',
        'numero_documento',
        'ruc',
        'convenio_id',
    ];

    /**
     * Get the tipoDocumento associated with the DatosPs4ta
     */
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class);
    }

    /**
     * Get the convenio associated with the DatosPs4ta
     */
    public function convenio()
    {
        return $this->belongsTo(Convenio::class);
    }
}
