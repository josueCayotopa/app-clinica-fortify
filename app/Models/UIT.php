<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UIT extends Model
{
    use HasFactory;
    protected $primaryKey = 'ano_proceso';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'ano_proceso',
        'num_uit_deducible',
    ];
}
