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
        Schema::create('comprobante_cuartas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_comprobante_id');
            $table->timestamps();
            $table->foreign('tipo_comprobante_id')->references('id')->on('tipo_comprobantes');
            $table->string('serie_comprobante', 4)->nullable();
            $table->decimal('numero_comprobante', 7,2)->nullable();
            $table->date('fecha_emision')->nullable();
            $table->date('fecha_pago')->nullable();
            $table->char('retencion_cuarta_categoria', 1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comprobante_cuartas');
    }
};
