<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDescuentos extends Model
{
    use HasFactory;
    protected $table = 'tipos_descuentos';
      
    protected $fillable = [
        'codigo',
        'anio_proceso',
        'mes_proceso',
        'descripcion',
        'porcentaje_descuento',
        'indice_tope',
        'importe_tope',
    ];

    public function afps()
    {
        return $this->belongsToMany(Afp::class, 'afpsdescuentos');
    }

    public function afp()
    {
        return $this->belongsTo(Afp::class);}


}
