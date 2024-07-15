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
        Schema::create('trabajador_cuarta_categorias', function (Blueprint $table) {
            $table->id();
            $table->string('ruc', 20)->nullable();
            $table->unsignedBigInteger('convenio_id')->nullable();
            $table->unsignedBigInteger('tipo_pago_id')->nullable();
            $table->unsignedBigInteger('tipo_banco_id')->nullable();
            $table->string('numero_bancaria', 40)->nullable();
            $table->string('monto_pago', 40)->nullable();
            
            // tablas para el calculo de planilla
            $table->unsignedBigInteger('periodo_laboral_id')->nullable();
            $table->unsignedBigInteger('jornada_laboral_id')->nullable();
            $table->unsignedBigInteger('dias_subcidiado_id')->nullable();
            $table->unsignedBigInteger('dias_no_subcidiado_id')->nullable();
            $table->unsignedBigInteger('sucursal_establecimiento_laboral_id')->nullable();
            $table->unsignedBigInteger('comprobante_cuarta_id')->nullable();
            
            

            $table->timestamps();
            
            $table->foreign('periodo_laboral_id')->references('id')->on('periodo_laborals');
            $table->foreign('jornada_laboral_id')->references('id')->on('jornada_laborals');
            $table->foreign('dias_subcidiado_id')->references('id')->on('dias_subcidiados');
            $table->foreign('dias_no_subcidiado_id')->references('id')->on('dias_no_subcidiados');
            $table->foreign('sucursal_establecimiento_laboral_id', 'fk_suc_est_lab')->references('id')->on('sucursal_establecimiento_laborals')->onDelete('cascade');
            $table->foreign('comprobante_cuarta_id')->references('id')->on('comprobante_cuartas');

            $table->foreign('convenio_id')->references('id')->on('convenios');
            $table->foreign('tipo_pago_id')->references('id')->on('tipo_pagos');
            $table->foreign('tipo_banco_id')->references('id')->on('tipo_bancos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajador_cuarta_categorias');
    }
};
