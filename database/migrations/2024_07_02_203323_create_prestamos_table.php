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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajador_id')->nullable();
            $table->date('fecha_prestamo')->nullable();
            $table->decimal('monto', 10, 2)->nullable();
            $table->decimal('tasa_interes', 5, 2)->nullable();
            $table->date('fecha_vencimiento')->nullable();
            $table->boolean('activo')->default(true)->nullable();
            $table->string('observaciones')->nullable()->nullable();
            $table->foreign('trabajador_id')->references('id')->on('datos_personals');
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
        Schema::dropIfExists('prestamos');
    }
};
