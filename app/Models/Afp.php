<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afp extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'nombre',
        'estado',
        'fecha_baja',
    ];

    public function tiposDescuentos()
    {
        return $this->belongsToMany(TipoDescuentos::class, 'afpsdescuentos');
    }

}
