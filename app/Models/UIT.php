<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UIT extends Model
{
    use HasFactory;
    protected $primaryKey = 'ano_proceso';
    protected $fillable = [
        'ano_proceso', 'num_uit_deducible',
    ];

    public function uItMensuals()
    {
        return $this->hasMany(UitMensual::class, 'ano_proceso', 'ano_proceso');
    }
}
