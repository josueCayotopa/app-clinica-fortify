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
        Schema::create('trabajadors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_trabajador_id')->nullable();
            $table->string('regimen_laboral', 40)->nullable();
            $table->unsignedBigInteger('nivel_edicativo_id')->nullable();

            $table->unsignedBigInteger('ocupacion_id')->nullable();
            $table->unsignedBigInteger('categoria_cargo_id')->nullable();
            $table->char('discapacidad', 1)->nullable();
            $table->unsignedBigInteger('regimen_pencionario_id')->nullable();
            $table->date('fecha_inscripcion_regimen')->nullable();
            $table->string('CUSPP', 12)->nullable();

            $table->unsignedBigInteger('sctrsalud_id')->nullable();
            $table->unsignedBigInteger('sctrpension_id')->nullable();


            $table->unsignedBigInteger('contrato_trabajo_id')->nullable();
            $table->char('trabajo_sujeto_alt_acum_atip_desc', 1)->nullable();
            $table->char('trabajo_sujeto_jornda_maxima', 1)->nullable();
            $table->char('trabajo_sujeto_horario_noctur', 1)->nullable();
            $table->char('ingresos_quinta_categoria', 1)->nullable();
            $table->char('sindicalizado', 1)->nullable();
            $table->unsignedBigInteger('periodicidad_id')->nullable();
            $table->char('afiliado_eps_servicios_propios', 1)->nullable();
            $table->unsignedBigInteger('eps_id')->nullable();


            $table->unsignedBigInteger('situacion_id')->nullable();
            
            
            $table->char('renta_quinta_categoria', 1)->nullable();
            $table->unsignedBigInteger('situacion_trabajador_id')->nullable();

            $table->unsignedBigInteger('tipo_pago_id')->nullable();
            $table->unsignedBigInteger('tipo_banco_id')->nullable();
            $table->string('numero_bancaria', 40)->nullable();
            $table->decimal('monto_pago', 10, 2)->nullable();
            $table->char('afilacion_asegura_pension', 1)->nullable();
            $table->unsignedBigInteger('categoria_ocupacional_id')->nullable();
            $table->unsignedBigInteger('convenio_id')->nullable();
            $table->unsignedBigInteger('periodo_laboral_id')->nullable();
            $table->char('otros_empleadores', 1)->nullable();
            $table->char('derechohabientes', 1)->nullable();
            $table->unsignedBigInteger('jornada_laboral_id')->nullable();
            $table->unsignedBigInteger('dias_subcidiado_id')->nullable();
            $table->unsignedBigInteger('dias_no_subcidiado_id')->nullable();
            $table->unsignedBigInteger('sucursal_establecimiento_laboral_id')->nullable();
            $table->unsignedBigInteger('remuneracion_id')->nullable();
            $table->timestamps();

            // Foreign keys without cascading delete
            $table->foreign('tipo_trabajador_id')->references('id')->on('tipo_trabajadors');
            $table->foreign('nivel_edicativo_id')->references('id')->on('nivel_educativos');
            $table->foreign('ocupacion_id')->references('id')->on('ocupacions');
            $table->foreign('categoria_cargo_id')->references('id')->on('categoria_cargos');
            $table->foreign('regimen_pencionario_id')->references('id')->on('regimen_pencionarios');
            $table->foreign('sctrsalud_id')->references('id')->on('s_c_t_r_saluds');
            $table->foreign('sctrpension_id')->references('id')->on('s_c_t_r_pensions');
            $table->foreign('contrato_trabajo_id')->references('id')->on('tipo_contratos_trabajos');
            $table->foreign('periodicidad_id')->references('id')->on('periodicidads');
            $table->foreign('eps_id')->references('id')->on('e_p_s');



            $table->foreign('situacion_eps_id')->references('id')->on('situacion_e_p_s');

            $table->foreign('situacion_trabajador_id')->references('id')->on('situacion_trabajadors');
           
                
            $table->foreign('tipo_pago_id')->references('id')->on('tipo_pagos');
            $table->foreign('tipo_banco_id')->references('id')->on('tipo_bancos');
            $table->foreign('categoria_ocupacional_id')->references('id')->on('categoria_ocupacionals');
            $table->foreign('convenio_id')->references('id')->on('convenios');
            $table->foreign('periodo_laboral_id')->references('id')->on('periodo_laborals');
            $table->foreign('jornada_laboral_id')->references('id')->on('jornada_laborals');
            $table->foreign('dias_subcidiado_id')->references('id')->on('dias_subcidiados');
            $table->foreign('dias_no_subcidiado_id')->references('id')->on('dias_no_subcidiados');
            $table->foreign('sucursal_establecimiento_laboral_id')->references('id')->on('sucursal_establecimiento_laborals');
            $table->foreign('remuneracion_id')->references('id')->on('remuneracions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajadors');
    }
};
