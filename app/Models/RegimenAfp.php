<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegimenAfp extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'regimen_id'];

    public function regimen()
    {
        return $this->belongsTo(RegimenPencionario::class);
    }

    public function descuentosPensiones()
    {
        return $this->hasMany(AfpDescuentosPensiones::class, 'afp_id');
    }

}
