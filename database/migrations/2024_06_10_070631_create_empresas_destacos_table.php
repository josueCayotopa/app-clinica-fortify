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
        Schema::create('empresas_destacos', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social')->nullable();
            $table->string('direccion')->nullable();
            $table->string('nombre_comercial')->nullable();
            $table->string('ruc_empresa')->nullable();
            $table->unsignedBigInteger('codigo_actividad_id')->nullable();

            $table->foreign('codigo_actividad_id')->references('id')->on('tipo_de_actividad');
         

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas_destacos');
    }
};
