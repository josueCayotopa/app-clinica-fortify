<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->string('codigo', 15);
            $table->string('descripcion');
            $table->string('nivel', 15); 
            $table->decimal('factor_hora_extra', 8, 2); 
            $table->decimal('factor_dia_viaje', 8, 2);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
};
