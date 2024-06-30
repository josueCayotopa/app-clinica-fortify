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
        Schema::create('tipos_descuentos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 15)->nullable(); 
            $table->year('anio_proceso')->nullable(); 
            $table->tinyInteger('mes_proceso')->unsigned(); 
            $table->string('descripcion', 255)->nullable(); 
            $table->decimal('porcentaje_descuento', 5, 2)->check('porcentaje_descuento >= 0 AND porcentaje_descuento <= 100'); 
            $table->char('indice_tope', 1)->check('indice_tope IN ("N", "S")')->nullable(); 
            $table->decimal('importe_tope', 15, 2)->nullable();
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
        Schema::dropIfExists('tipos_descuentos');
    }
};
