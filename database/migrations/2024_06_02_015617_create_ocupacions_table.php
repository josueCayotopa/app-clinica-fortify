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
        Schema::create('ocupacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->unsignedBigInteger('tipo_trabajador_id');
            $table->string('codigo_sunat')->nullable();
            $table->string('descripcion')->nullable();
            $table->char('ind_directivo',1)->nullable();
            $table->boolean('estado')->default(true)->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('tipo_trabajador_id')->references('id')->on('tipo_trabajadors');

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
        Schema::dropIfExists('ocupacions');
    }
};
