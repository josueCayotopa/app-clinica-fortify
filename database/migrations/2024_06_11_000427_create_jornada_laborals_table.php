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
        Schema::create('jornada_laborals', function (Blueprint $table) {
            $table->id();
            $table->integer('horas_trabajadas')->nullable();           
            $table->integer('minutos_trabajados')->nullable();          
            $table->integer('horas_sobretiempo')->nullable(); 
            $table->integer('minutos_sobretiempo')->nullable(); 
            $table->string('descripcion')->nullable(); 
            $table->integer('numero_dias_semana')->nullable(); 
            $table->time('hora_ingreso')->nullable(); 
            $table->time('hora_salida')->nullable(); 

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
        Schema::dropIfExists('jornada_laborals');
    }
};
