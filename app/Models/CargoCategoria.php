<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoCategoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id', 'categoria_id', 'cargo_id', 'descripcion', 'codigo_sunat', 'ind_directivo'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }


}
