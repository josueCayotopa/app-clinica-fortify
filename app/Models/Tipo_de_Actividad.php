<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_de_Actividad extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'descripcion'
    ];

    // Define la relación con el modelo EmpresaMeDestacan
    public function empresasMeDestacan()
    {
        return $this->hasMany(EmpresaMeDestacan::class, 'codigo_actividad_id');
    }
}
