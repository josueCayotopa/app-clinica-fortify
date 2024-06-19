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
        Schema::create('sucursals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->string('nombre_sucursal');
            $table->string('telefono');
            $table->string('fax');
            $table->string('email');
            $table->date('fecha_inicio');
            $table->string('codigo_ubigeo');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('provincia_id');
            $table->unsignedBigInteger('distrito_id');
            $table->unsignedBigInteger('zona_id');
            $table->unsignedBigInteger('via_id');
            $table->string('des_direccion');
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('tipo_establecimiento_id')->nullable();
            $table->string('denominacion_establecimiento', 40)->nullable(); // Columna no nula
            $table->char('centro_riesgo', 1)->nullable(); // Columna no nula
            $table->decimal('tasa_sctr_essalud', 3, 2)->nullable(); // Columna no nula
            $table->timestamps();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('departamento_id')->references('id')->on('departamento__regions');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('distrito_id')->references('id')->on('distritos');
            $table->foreign('zona_id')->references('id')->on('zonas');
            $table->foreign('via_id')->references('id')->on('vias');
            $table->foreign('tipo_establecimiento_id')->references('id')->on('tipo_establecimiento')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursals');
    }
};
