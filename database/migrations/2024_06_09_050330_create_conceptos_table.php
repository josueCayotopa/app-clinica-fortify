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
        Schema::create('conceptos', function (Blueprint $table) {
            $table->string('COD_CONCEPTO', 4)->primary();

            $table->unsignedBigInteger('COD_EMPRESA');
            $table->foreign('COD_EMPRESA')->references('id')->on('empresas');

            $table->string('DES_NOMBRE')->nullable();
            $table->string('DES_NOMBRE_CORTO', 10)->nullable();
            $table->string('NUM_VER_PLAN_CUENTAS', 3)->nullable();
            $table->string('TIP_CONCEPTO', 2)->nullable();
            $table->string('COD_CUENTA_CARGO', 20);
            $table->string('TIP_OPERACION', 2)->nullable();
            $table->char('IND_FORMULA', 1)->nullable();
            $table->string('COD_CUENTA_ABONO', 20)->nullable();
            $table->string('COD_FORMULA', 3)->nullable();
            $table->decimal('NUM_GRUPO', 2, 0)->nullable();
            $table->string('TIP_RENTA_QTACAT', 2)->nullable();
            $table->string('TIP_APLICACION', 2)->nullable();
            $table->char('IND_GRATIFICA', 1)->nullable();

            $table->unsignedBigInteger('COD_MONEDA_DEFAULT');
            $table->foreign('COD_MONEDA_DEFAULT')->references('id')->on('tipo_monedas');

            $table->char('IND_RECIBE_CONCEPTO', 1)->nullable();
            $table->string('TIP_CTS', 2)->nullable();
            $table->string('TIP_INGRESO', 2)->nullable();
            $table->string('TIP_AUTO_MAN', 2)->nullable();
            $table->char('IND_TOTAL', 1)->nullable();
            $table->string('COD_CONCEPTO_ORIGEN', 4)->nullable();
            $table->string('COD_USER_ACTUAL', 8)->nullable();
            $table->char('IND_GRATI_SEM', 1)->nullable();
            $table->string('CTA_CARGO_SALARIO', 20)->nullable();
            $table->string('CTA_ABONO_SALARIO', 20)->nullable();
            $table->char('IND_UTILIDADES', 1)->nullable();
            $table->string('COD_SUNAT', 10)->nullable();
            $table->string('DES_NOMBRE_SUNAT', 100)->nullable();
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
        Schema::dropIfExists('conceptos');
    }
};
