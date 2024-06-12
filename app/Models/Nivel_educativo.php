<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel_educativo extends Model
{
    use HasFactory;
    protected $fillable = [
        'descripcion',
        'estado'
    ];

    public function personals()
    {
        return $this->hasMany(Personal::class, 'nivel_edicativo_id');
    }
}
