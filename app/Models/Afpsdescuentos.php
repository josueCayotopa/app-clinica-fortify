<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Afpsdescuentos extends Model
{
    use HasFactory;
    protected $table = 'afpsdescuentos';

    public function afp()
    {
        return $this->belongsTo(Afp::class);
    }

    public function tipoDescuento()
    {
        return $this->belongsTo(TipoDescuentos::class);
    }
    protected $fillable = [
        'afp_id',
        'tipo_descuento_id',];
}
