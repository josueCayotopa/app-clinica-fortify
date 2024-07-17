<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguroMedico extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion'
    ];
    //modalidadformativa
    public function modalidadformativa()
    {
        return $this->hasMany(ModalidadFormativa::class, 'seguro_medico_id');
    }
}
