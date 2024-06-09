<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UITMensual extends Model
{
    use HasFactory;
    protected $table = 'u_i_t_mensuals';
    protected $fillable = [
        'ano_proceso', 'mes_proceso', 'imp_valor_uit',
    ];

    public function uit()
    {
        return $this->belongsTo(Uit::class, 'ano_proceso', 'ano_proceso');
    }
}
