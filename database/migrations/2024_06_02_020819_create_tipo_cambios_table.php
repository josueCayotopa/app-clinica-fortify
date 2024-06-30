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
        Schema::create('tipo_cambios', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_de_cambio')->nullable();
            $table->decimal('impuesto_a_la_venta', 8, 2)->nullable();
            $table->decimal('impuesto_a_la_compra', 8, 2)->nullable();
            $table->date('fecha_que_actualiza')->nullable();
            $table->decimal('imp_venta_cierre', 8, 2)->nullable();
            $table->decimal('imp_compra_cierre', 8, 2)->nullable();
            $table->unsignedBigInteger('codigo_moneda')->nullable();
            $table->unsignedBigInteger('cod_moneda_referencia')->nullable();
            $table->timestamps(); // Esto añade created_at y updated_at
            // Foreign keys
            $table->foreign('codigo_moneda')->references('id')->on('tipo_monedas');
            $table->foreign('cod_moneda_referencia')->references('id')->on('tipo_monedas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_cambios');
    }
};
