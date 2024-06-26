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
        
            Schema::create('remuneracion_pencionistas', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('pensionista_id'); // Definir la columna primero
                $table->string('concepto_id', 4);
                $table->decimal('monto_devengado', 7, 2)->nullable();
                $table->decimal('monto_pagado', 7, 2)->nullable();
                $table->timestamps();
            
                // Añadir las claves foráneas después de definir las columnas
                $table->foreign('pensionista_id')->references('id')->on('pensionistas')->onDelete('cascade');
                $table->foreign('concepto_id')->references('COD_CONCEPTO')->on('conceptos')->onDelete('cascade');
            });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remuneracion_pencionistas');
    }
};
