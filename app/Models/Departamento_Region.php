<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento_Region extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'descripcion','codigo','nacionalidad_id',
    ];
    public function provincias()
    {
        return $this->hasMany(Provincia::class);
    }
    public function pais()
    {
        return $this->belongsTo(Nacionalidad::class, 'nacionalidad_id');
    }

}
