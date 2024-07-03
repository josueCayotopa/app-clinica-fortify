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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->date('fecha'); // Combina año, mes y día en un solo campo
            $table->time('hora_entrada')->nullable(); // Campo para la hora de entrada
            $table->time('hora_salida')->nullable(); // Campo para la hora de salida
            $table->unsignedBigInteger('trabajador_id')->nullable();
            $table->foreign('trabajador_id')->references('id')->on('datos_personals');
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
        Schema::dropIfExists('asistencias');
    }
};
