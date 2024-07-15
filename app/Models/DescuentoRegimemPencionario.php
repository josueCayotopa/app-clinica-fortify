<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescuentoRegimemPencionario extends Model
{
    protected $table = 'descuento_regimem_pencionarios';
    use HasFactory;
    protected $fillable = ['descripcion'];
}
