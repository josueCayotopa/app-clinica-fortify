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
        Schema::create('establecimientos_destaco_personals', function (Blueprint $table) {
            $table->id();
            $table->string('denominacion')->nullable();
            $table->char('centro_riesgo',1)->nullable();
            $table->string('Tasa_SCTR_EsSalud')->nullable();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->unsignedBigInteger('empresa_destaco_id')->nullable();
            $table->foreign('empresa_destaco_id')->references('id')->on('empresas_destacos');
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
        Schema::dropIfExists('establecimientos_descato_personals');

    }
};
