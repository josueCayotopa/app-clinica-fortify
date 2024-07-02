<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaPeriodo extends Model
{
    use HasFactory;
    protected $fillable = ['descripcion'];

    public function periodoLaborals()
    {
        return $this->hasMany(PeriodoLaboral::class, 'categoria_periodos_id');
    }

}
