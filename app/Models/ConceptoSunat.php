<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConceptoSunat extends Model
{
    use HasFactory;
    protected $table = 'concepto_sunats';
    protected $fillable = ['CODIGO', 'DESCRIPCION'];
}
