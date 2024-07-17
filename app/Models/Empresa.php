<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    protected $fillable = [
        'codigo_empresa', 'direccion', 'razon_social', 'nombre_comercial', 'ruc_empresa',
        'numero_decreto_supremo', 'nombre_representante_legal', 'tipo_documento_id', 'numero_documento',
        'email', 'numero_telefono', 'codigo_ubigeo', 'departamento_id', 'provincia_id',
        'distrito_id', 'zona_id', 'via_id', 'pais_id', 'tipo_moneda_id', 
    ];

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento_Region::class);
    }

    public function provincia()
    {
        return $this->belongsTo(Provincia::class);
    }

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

    public function nacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class, 'pais_id');
    }

    public function tipoMoneda()
    {
        return $this->belongsTo(Tipo_Moneda::class, 'tipo_moneda_id');
    }

    //joscar
    public function sucursales(){
        return $this->hasMany(Sucursal::class);
    }
   
}
