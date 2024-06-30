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
        Schema::create('modalidad_formativas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seguro_medico_id');
            $table->unsignedBigInteger('nivel_educativo_id');
            $table->unsignedBigInteger('ocupacion_id');
            $table->char('madre_responsabilidad', 1)->nullable();
            $table->char('discapacidad', 1)->nullable();
            $table->unsignedBigInteger('institucion_id');
            $table->char('horario_nocturno', 1)->nullable();
            $table->unsignedBigInteger('tipo_pago_id')->nullable();
            $table->unsignedBigInteger('tipo_banco_id')->nullable();
            $table->string('numero_bancaria', 40)->nullable();
            $table->string('monto_pago', 40)->nullable();

            // tablas  apr el calculo de palnilla
            $table->unsignedBigInteger('periodo_laboral_id')->nullable();
            $table->unsignedBigInteger('jornada_laboral_id')->nullable();
            $table->unsignedBigInteger('dias_subcidiado_id')->nullable();
            $table->unsignedBigInteger('dias_no_subcidiado_id')->nullable();
            $table->unsignedBigInteger('sucursal_establecimiento_laboral_id')->nullable();

            $table->timestamps();

            $table->foreign('periodo_laboral_id')->references('id')->on('periodo_laborals');
            $table->foreign('jornada_laboral_id')->references('id')->on('jornada_laborals');
            $table->foreign('dias_subcidiado_id')->references('id')->on('dias_subcidiados');
            $table->foreign('dias_no_subcidiado_id')->references('id')->on('dias_no_subcidiados');
            $table->foreign('sucursal_establecimiento_laboral_id')->references('id')->on('sucursal_establecimiento_laborals');
          
            //nivel_educativos
            $table->foreign('nivel_educativo_id')->references('id')->on('nivel_educativos');
            // 
            $table->foreign('ocupacion_id')->references('id')->on('ocupacions');
            // 
            $table->foreign('institucion_id')->references('id')->on('institucions');
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
        Schema::dropIfExists('modalidad_formativas');
    }
};
