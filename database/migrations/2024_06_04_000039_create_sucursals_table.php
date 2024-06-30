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
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->string('nombre_sucursal')->nullable();
            $table->string('telefono')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->string('codigo_ubigeo')->nullable();
            $table->unsignedBigInteger('departamento_id')->nullable();
            $table->unsignedBigInteger('provincia_id')->nullable();
            $table->unsignedBigInteger('distrito_id')->nullable();
            $table->unsignedBigInteger('zona_id')->nullable();
            $table->unsignedBigInteger('via_id')->nullable();
            $table->string('des_direccion')->nullable();
            $table->boolean('estado')->default(true)->nullable();
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
