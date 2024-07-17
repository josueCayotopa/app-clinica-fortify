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
        Schema::create('periodo_laborals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_periodos_id')->nullable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->unsignedBigInteger('motivo_fin_id')->nullable();
            $table->timestamps();
            $table->foreign('categoria_periodos_id')->references('id')->on('categoria_periodos');
            $table->foreign('motivo_fin_id')->references('id')->on('motivo_fin_periodos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodo_laborals');
    }
};
