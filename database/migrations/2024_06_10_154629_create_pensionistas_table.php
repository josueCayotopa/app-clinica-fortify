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
        Schema::create('pensionistas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_documento_id');
            $table->string('numero_documento', 15);
            $table->unsignedBigInteger('tipo_trabajador_id');
           
            $table->unsignedBigInteger('regimen_pencionario_id');
            $table->date('fecha_inscirpcion');
            $table->string('cuspp', 12);
            $table->unsignedBigInteger('situacion_e_p_s_id');
            $table->unsignedBigInteger('tipo_pago_id');

            $table->timestamps();
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onDelete('cascade');
            $table->foreign('tipo_trabajador_id')->references('id')->on('tipo_trabajadors')->onDelete('cascade');
            $table->foreign('regimen_pencionario_id')->references('id')->on('regimen_pencionarios')->onDelete('cascade');
            $table->foreign('situacion_e_p_s_id')->references('id')->on('situacion_e_p_s')->onDelete('cascade');
            $table->foreign('tipo_pago_id')->references('id')->on('tipo_pagos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pensionistas');
    }
};
