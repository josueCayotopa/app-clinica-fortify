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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_empresa');
            $table->string('razon_social');
            $table->string('direccion');
            $table->string('nombre_comercial');
            $table->string('ruc_empresa');
            $table->string('numero_decreto_supremo');
            $table->string('nombre_representante_legal');
            $table->unsignedBigInteger('tipo_documento_id');
            $table->string('numero_documento');
            $table->string('email');
            $table->string('numero_telefono');
            $table->string('codigo_ubigeo');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('provincia_id');
            $table->unsignedBigInteger('distrito_id');
            $table->unsignedBigInteger('zona_id');
            $table->unsignedBigInteger('via_id');
            $table->unsignedBigInteger('pais_id');
            
           
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
            $table->foreign('departamento_id')->references('id')->on('departamento__regions');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('distrito_id')->references('id')->on('distritos');
            $table->foreign('zona_id')->references('id')->on('zonas');
            $table->foreign('via_id')->references('id')->on('vias');
            $table->foreign('pais_id')->references('id')->on('nacionalidad');
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
        Schema::dropIfExists('empresas');
    }
};
