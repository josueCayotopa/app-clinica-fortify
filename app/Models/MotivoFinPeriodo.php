<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivoFinPeriodo extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'descripcion',
        'estado',
];

    public function periodoLaborals()
    {
        return $this->hasMany(PeriodoLaboral::class, 'categoria_periodos_id');
    }

}
