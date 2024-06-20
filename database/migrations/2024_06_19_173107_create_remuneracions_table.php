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
        Schema::create('remuneracions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajador_id');
            $table->string('concepto_id', 4);  // Ajuste aquí para que coincida con la longitud de COD_CONCEPTO
            $table->decimal('monto_devengado', 7, 2)->nullable();
            $table->decimal('monto_pagado', 7, 2)->nullable();
            $table->timestamps();
            $table->foreign('trabajador_id')->references('id')->on('personals')->onDelete('cascade');
            $table->foreign('concepto_id')->references('COD_CONCEPTO')->on('conceptos')->onDelete('cascade');  // Ajuste aquí para referenciar a COD_CONCEPTO
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remuneracions');
    }
};
