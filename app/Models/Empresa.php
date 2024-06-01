<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo_empresa',
        'razon_social',
        'direccion',
        'nombre_comercial',
        'ruc_empresa',
        'numero_decreto_supremo',
        'nombre_representante_legal',
        'tipo_documento_id',
        'numero_documento',
        'email',
        'numero_telefono',
        'codigo_ubigeo',
        'distrito_id',
        'zona_id',
        'via_id',
        'pais_id',
    ];
    
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id');
    }
    
    public function distrito()
    {
        return $this->belongsTo(Distrito::class, 'distrito_id');
    }
    
    public function zona()
    {
        return $this->belongsTo(Zona::class, 'zona_id');
    }
    
    public function via()
    {
        return $this->belongsTo(Via::class, 'via_id');
    }
    
    public function pais()
    {
        return $this->belongsTo(Nacionalidad::class, 'pais_id');
    }
}
