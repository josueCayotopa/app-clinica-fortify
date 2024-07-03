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
        Schema::create('licencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajador_id')->nullable(); 
            $table->unsignedBigInteger('tipo_suspencion_id')->nullable();   
            $table->date('fecha_inicio')->nullable();        
            $table->date('fecha_fin')->nullable();
            $table->string('descripcion')->nullable();     
            $table->timestamps();
            $table->foreign('tipo_suspencion_id')->references('id')->on('tipo_suspensions');
            $table->foreign('trabajador_id')->references('id')->on('datos_personals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licencias');
    }
};
