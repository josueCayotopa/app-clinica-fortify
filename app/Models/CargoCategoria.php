<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargoCategoria extends Model
{
    use HasFactory;
    protected $table = 'categoria_cargos';

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
    protected $fillable = [
        'categoria_id',
        'cargo_id',
    ];
    

}
