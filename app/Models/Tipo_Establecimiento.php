<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Establecimiento extends Model
{
    use HasFactory;

    protected $table = 'tipo_establecimiento';
    
    protected $fillable = [
        'descripcion',
    ];

}
