<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SCTRPension extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'descripcion',
        
    ];
    public function trabajadores()
    {
        return $this->hasMany(Trabajador::class, 'sctrpension_id');
    }
}
