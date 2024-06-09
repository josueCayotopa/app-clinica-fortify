<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTrabajadorIpss extends Model
{
    use HasFactory;
    protected $table = 'tipo_trabajador_ipsses';
    protected $primaryKey = 'COD_TRABAJ_IPSS';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'COD_TRABAJ_IPSS',
        'DES_COD_TRABAJ_IPSS',
    ];
}
