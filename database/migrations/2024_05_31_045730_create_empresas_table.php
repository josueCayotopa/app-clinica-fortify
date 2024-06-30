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
            $table->string('codigo_empresa')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('direccion')->nullable();
            $table->string('nombre_comercial')->nullable();
            $table->string('ruc_empresa')->nullable();
            $table->string('numero_decreto_supremo')->nullable();
            
            $table->string('nombre_representante_legal')->nullable();
            $table->unsignedBigInteger('tipo_documento_id')->nullable();
            $table->string('numero_documento')->nullable();
            $table->string('email')->nullable();
            $table->string('numero_telefono')->nullable();
            $table->string('codigo_ubigeo')->nullable();
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->unsignedBigInteger('provincia_id')->nullable();
            $table->unsignedBigInteger('distrito_id')->nullable();
            $table->unsignedBigInteger('zona_id')->nullable();
            $table->unsignedBigInteger('via_id')->nullable();
            $table->unsignedBigInteger('pais_id')->nullable();

            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
            $table->foreign('departamento_id')->references('id')->on('departamento__regions');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('distrito_id')->references('id')->on('distritos');
            $table->foreign('zona_id')->references('id')->on('zonas');
            $table->foreign('via_id')->references('id')->on('vias');
            $table->foreign('pais_id')->references('id')->on('nacionalidad');
            $table->unsignedBigInteger('tipo_moneda_id')->nullable();
            $table->foreign('tipo_moneda_id')->references('id')->on('tipo_monedas');
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
