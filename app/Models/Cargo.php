<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
   
  use HasFactory;
  protected $fillable = [
      'codigo',
      'descripcion',
  ];

  public function categorias()
  {
      return $this->belongsToMany(Categoria::class, 'categoria_cargo');}


}
