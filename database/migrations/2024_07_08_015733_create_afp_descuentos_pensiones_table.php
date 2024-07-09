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
        Schema::create('afp_descuentos_pensiones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('afp_id')->constrained('regimen_afps');
            $table->foreignId('descuento_id')->constrained('descuento_regimem_pencionarios');
            $table->enum('tipo_comision', ['FLUJO', 'MIXTA']);
            $table->date('fecha');
            $table->decimal('porcentaje', 5, 2); // Porcentaje manejado con dos decimales
            $table->decimal('importe_tope', 10, 2);
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
        Schema::dropIfExists('afp_descuentos_pensiones');
    }
};
