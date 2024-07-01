<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SucursalEstablecimientoLaboral extends Model
{
    use HasFactory;
    protected $fillable = [
        'sucursalpropio_id',
        'empresa_me_dastacan_id',
    ];

    public function sucursalPropio()
    {
        return $this->belongsTo(Sucursal::class, 'sucursalpropio_id');
    }

    public function empresaMeDestacan()
    {
        return $this->belongsTo(EmpresaMeDestacan::class, 'empresa_me_dastacan_id');
    }

    public function trabajadores()
    {
        return $this->hasMany(ConceptoSunat::class, 'sucursal_establecimiento_laboral_id');
    }
}
