<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConceptosCuentas extends Model
{
    use HasFactory;

    protected $table = 'conceptos_cuentas';
    protected $primaryKey = 'CODIGO';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'CODIGO',
        'DESCRIPCION',
        'CODIGO_CUENTA_CON',
        'CODIGO_CONCEPTO'
    ];

    public $timestamps = true;
    public function concepto()
    {
        return $this->belongsTo(Concepto::class, 'CODIGO_CONCEPTO', 'COD_CONCEPTO');
    }
}
