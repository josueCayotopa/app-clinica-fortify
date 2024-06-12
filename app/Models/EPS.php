<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EPS extends Model
{
    use HasFactory;
    protected $fillable = [
        'ruc',
        'descripcion',
        'estado'
    ];
    public function personals()
    {
    return $this->hasMany(Personal::class, 'eps_id');
    }
}
