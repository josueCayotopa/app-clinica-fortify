<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $fillable = [
        'empresa_id',
        'nombre_sucursal',
        'telefono',
        'fax',
        'ruc_empresa',
        'email',
        'fecha_inicio',
        'codigo_ubigeo',
        'departamento_id',
        'provincia_id',
        'distrito_id',
        'codigo_ubigeo',
        'distrito_id',
        'zona_id',
        'via_id',
        'des_direccion',
    ];
   
    
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
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

}
