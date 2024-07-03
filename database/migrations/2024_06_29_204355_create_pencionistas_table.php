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
        Schema::create('pencionistas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_pensionista_id');
            $table->unsignedBigInteger('regimen_pencionario_id');
            $table->date('fecha_inscirpcion');
            $table->string('cuspp', 12);
            $table->unsignedBigInteger('situacion_e_p_s_id');
            $table->unsignedBigInteger('tipo_pago_id');
            $table->unsignedBigInteger('tipo_banco_id')->nullable();
            $table->string('numero_bancaria', 40)->nullable();
            $table->string('monto_pago', 40)->nullable();
            $table->unsignedBigInteger('periodo_laboral_id')->nullable();
            $table->char('derechohabientes', 1)->nullable();
            $table->unsignedBigInteger('remuneracion_pencionista_id')->nullable();

            $table->foreign('remuneracion_pencionista_id')->references('id')->on('remuneracion_pencionistas');

            $table->unsignedBigInteger('sucursal_establecimiento_laboral_id')->nullable();

            $table->foreign('periodo_laboral_id')->references('id')->on('periodo_laborals');
            $table->foreign('tipo_pensionista_id')->references('id')->on('tipo_trabajadors');
            $table->foreign('regimen_pencionario_id')->references('id')->on('regimen_pencionarios');
            $table->foreign('situacion_e_p_s_id')->references('id')->on('situacion_e_p_s');
            $table->foreign('tipo_pago_id')->references('id')->on('tipo_pagos');
            $table->foreign('tipo_banco_id')->references('id')->on('tipo_bancos');
            $table->foreign('sucursal_establecimiento_laboral_id')->references('id')->on('sucursal_establecimiento_laborals');
            

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
        Schema::dropIfExists('pencionistas');
    }
};
