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
            $table->unsignedBigInteger('concepto_sunat_id')->nullable();
            // Ajuste aquí para que coincida con la longitud de COD_CONCEPTO
            $table->decimal('monto_devengado', 7, 2)->nullable();
            $table->decimal('monto_pagado', 7, 2)->nullable();
            $table->timestamps();
            $table->foreign('concepto_sunat_id')->references('id')->on('concepto_sunats');  // Ajuste aquí para referenciar a COD_CONCEPTO
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
