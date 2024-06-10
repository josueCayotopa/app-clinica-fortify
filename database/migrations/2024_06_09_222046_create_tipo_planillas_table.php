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
        Schema::create('tipo_planillas', function (Blueprint $table) {
            $table->string('CODIGO', 2)->primary();
            $table->unsignedBigInteger('CODIGO_EMPRESA');
            $table->foreign('CODIGO_EMPRESA')->references('id')->on('empresas');
            $table->string('DES_TIPO_PLANILLA', 30)->nullable();
            $table->string('TIP_PROC_SEMA', 2)->nullable();
            $table->string('TIP_PROCESO', 2)->nullable();
            $table->string('NUM_VER_PLAN_CUENTAS', 20)->nullable();
            $table->foreign('NUM_VER_PLAN_CUENTAS')->references('CODIGO')->on('conceptos_cuentas');
            $table->string('COD_CUENTA_CARGO', 20)->nullable();
            $table->char('IND_REDONDEO', 1)->nullable();
            $table->string('TIP_REDONDEO', 2)->nullable();
            $table->char('IND_DER_PLANILLA', 1)->nullable();
            $table->decimal('IMP_TOPE_PRESTAMO', 12, 2)->nullable();
            $table->decimal('NUM_PORC_ADELA_QUINCE', 5, 2)->nullable();
            $table->string('TIP_APLICA_PRESTAMO', 2)->nullable();
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
        Schema::dropIfExists('tipo_planillas');
    }
};
