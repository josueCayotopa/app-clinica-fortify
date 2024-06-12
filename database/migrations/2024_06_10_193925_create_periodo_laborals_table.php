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
            $table->unsignedBigInteger('personal_id');
            $table->unsignedBigInteger('categoria_id');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->unsignedBigInteger('motivo_fin_id');
            $table->unsignedBigInteger('modalidad_formativa_id');
            $table->timestamps();
            // motivo_fin_periodos
            $table->foreign('personal_id')->references('id')->on('personals')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categoria_sunats')->onDelete('cascade');
            $table->foreign('motivo_fin_id')->references('id')->on('motivo_fin_periodos')->onDelete('cascade');
            $table->foreign('modalidad_formativa_id')->references('id')->on('tipo_modalidad_formativas')->onDelete('cascade');
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
