<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        // Agrega aquí las demás columnas de la tabla "tipo_documentos"
    ];
    
    public function empresas()
    {
        return $this->hasMany(Empresa::class, 'tipo_documento_id');
    }
    public function personals()
    {
        return $this->hasMany(Personal::class, 'tipo_documento_id');
    }
}
