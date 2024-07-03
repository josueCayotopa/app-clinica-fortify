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
        Schema::create('vacaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajador_id')->nullable();
            $table->date('fecha_inicio')->nullable();
            $table->date('fecha_fin')->nullable();
            $table->integer('numero_dias')->nullable();
            $table->boolean('activo')->default(true);

            // Clave foránea
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
        Schema::dropIfExists('vacaciones');
    }
};
