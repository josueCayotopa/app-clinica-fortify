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
        Schema::create('dias_no_subcidiados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_suspencion_id')->nullable();  
            $table->string('numero_citt')->nullable();        
            $table->date('fecha_inicio')->nullable();        
            $table->date('fecha_fin')->nullable();     
            $table->timestamps();
            $table->foreign('tipo_suspencion_id')->references('id')->on('tipo_suspensions');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dias_no_subcidiados');
    }
};
