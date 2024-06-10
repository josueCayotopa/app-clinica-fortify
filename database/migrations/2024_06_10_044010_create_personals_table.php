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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_documento_id');
           
            $table->string('numero_documento', 15);
            $table->string('apellido_paterno', 40);
            $table->string('apellido_materno', 40);
            $table->string('nombres', 40);
            $table->date('fecha_nacimiento');
            $table->char('sexo', 1);
            $table->unsignedBigInteger('nacionalidad_id');
            $table->string('telefono', 10)->nullable();
            $table->string('correo_electronico', 50)->nullable();
            $table->char('essalud_vida', 1);
            $table->char('domiciliado', 1);
            $table->unsignedBigInteger('via_id');
            $table->string('nombre_via', 20)->nullable();
            $table->string('numero_via', 4)->nullable();
            $table->string('interior', 4)->nullable();
            $table->unsignedBigInteger('zona_id');
            $table->string('nombre_zona', 20)->nullable();
            $table->string('referencia', 40)->nullable();
            $table->unsignedBigInteger('distrito_id');
            // datos de trabajador
            $table->unsignedBigInteger('tipo_trabajador_id');
            $table->string('regimen_laboral', 40)->nullable();
            $table->unsignedBigInteger('nivel_edicativo_id');
            $table->unsignedBigInteger('ocupacion_id');
            $table->char('discapacidad', 1)->nullable();
            // regimen pensionario 
            $table->unsignedBigInteger('regimen_pencionario_id');
            $table->date('fecha_inscripcion_regimen')->nullable();
            $table->string('CUSPP', 12)->nullable();
            $table->char('SCTR_salud', 1)->nullable();
            $table->char('SCTR_pension', 1)->nullable();
            $table->unsignedBigInteger('contrato_trabajo_id');
            $table->char('trabajo_sujeto_alt_acum_atip_desc', 1)->nullable();
            $table->char('trabajo_sujeto_jornda_maxima', 1)->nullable();
            $table->char('trabajo_sujeto_horario_noctur', 1)->nullable();
            $table->char('ingresos_quinta_categoria', 1)->nullable();
            $table->char('sindicalizado', 1)->nullable();
            $table->unsignedBigInteger('periodicidad_id');
            $table->char('afiliado_eps_servicios_propios', 1)->nullable();
            $table->unsignedBigInteger('eps_id');
            $table->unsignedBigInteger('situacion_id');
            $table->char('renta_quinta_categoria', 1)->nullable();
            $table->char('situacion_especial_trabajador', 1)->nullable();
            $table->unsignedBigInteger('tipo_pago_id');
            $table->char('afilacion_asegura_pension', 1)->nullable();
            $table->char('categoria_ocupacional_trabajador', 1)->nullable();
            $table->unsignedBigInteger('convenio_id');

            

 
            

        
            $table->timestamps();
            // foreig key   
            $table->foreign('distrito_id')->references('id')->on('distritos')->onDelete('cascade');
            $table->foreign('zona_id')->references('id')->on('zonas')->onDelete('cascade');
            $table->foreign('via_id')->references('id')->on('vias')->onDelete('cascade');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidad')->onDelete('cascade');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onDelete('cascade');

            $table->foreign('tipo_trabajador_id')->references('id')->on('tipo_trabajadors')->onDelete('cascade');
            $table->foreign('nivel_edicativo_id')->references('id')->on('nivel_educativos')->onDelete('cascade');
            $table->foreign('ocupacion_id')->references('id')->on('ocupacions')->onDelete('cascade');
            $table->foreign('regimen_pencionario_id')->references('id')->on('regimen_pencionarios')->onDelete('cascade');
            $table->foreign('contrato_trabajo_id')->references('id')->on('tipo_contratos_trabajos')->onDelete('cascade');

            $table->foreign('periodicidad_id')->references('id')->on('periodicidads')->onDelete('cascade');
            $table->foreign('eps_id')->references('id')->on('e_p_s')->onDelete('cascade');
            $table->foreign('situacion_id')->references('id')->on('situacion_e_p_s')->onDelete('cascade');
            $table->foreign('tipo_pago_id')->references('id')->on('tipo_pagos')->onDelete('cascade');
            $table->foreign('convenio_id')->references('id')->on('convenios')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personals');
    }
};
