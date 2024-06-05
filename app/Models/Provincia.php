<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'descripcion',
        'departamento_id',
    ];
    public function departamento()
    {
        return $this->belongsTo(Departamento_Region::class, 'departamento_id');
    }

    public function distritos()
    {
        return $this->hasMany(Distrito::class);
    }
}
