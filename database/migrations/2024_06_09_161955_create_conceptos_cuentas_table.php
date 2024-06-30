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
        Schema::create('conceptos_cuentas', function (Blueprint $table) {
            $table->string('CODIGO', 20)->primary();
            $table->string('DESCRIPCION', 255)->nullable();
            $table->string('CODIGO_CUENTA_CON', 20)->nullable();
            $table->string('CODIGO_CONCEPTO', 4)->nullable();
            $table->foreign('CODIGO_CONCEPTO')->references('COD_CONCEPTO')->on('conceptos');

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
        Schema::dropIfExists('conceptos_cuentas');
    }
};
