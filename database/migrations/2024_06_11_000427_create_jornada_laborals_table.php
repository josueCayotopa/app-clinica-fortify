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
            $table->unsignedBigInteger('trabajador_id');
            $table->integer('horas_trabajadas');           
            $table->integer('minutos_trabajados');         
            $table->integer('horas_sobretiempo')->nullable(); 
            $table->integer('minutos_sobretiempo')->nullable(); 
            $table->timestamps();
            $table->foreign('trabajador_id')->references('id')->on('personals')->onDelete('cascade');
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
