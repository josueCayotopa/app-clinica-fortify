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
        Schema::create('calculo_planillas', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_calculo');
            $table->decimal('sueldo_base', 10, 2)->nullable();
            $table->decimal('asignacion_familiar', 10, 2)->nullable();
            $table->integer('numero_horas_extras')->nullable();
            $table->decimal('monto_horas_extras', 10, 2)->nullable();
            $table->decimal('comisiones_venta', 10, 2)->nullable(); // Corregido el nombre del campo
            $table->decimal('gratificaciones', 10, 2)->nullable();
            $table->decimal('asignaciones', 10, 2)->nullable();
            $table->decimal('viaticos', 10, 2)->nullable();
            $table->decimal('primas', 10, 2)->nullable();
            $table->integer('dias_subsidiados')->nullable();// Corregido el nombre del campo
    
            $table->decimal('sueldo_bruto', 10, 2)->nullable();
    
            $table->integer('dias_no_subsidiados')->nullable(); // Corregido el nombre del campo
            $table->integer('dias_vacaciones')->nullable();
            $table->decimal('monto_dias_no_subsidiados', 10, 2)->default(0); // Corregido el nombre del campo
            $table->decimal('monto_dias_vacaciones', 10, 2)->default(0);
            $table->decimal('prestamos', 10, 2)->default(0);
            $table->decimal('adelantos', 10, 2)->default(0);
            $table->decimal('monto_regimen_pensionario', 10, 2)->default(0);
            $table->decimal('monto_essalud', 10, 2)->default(0);
            $table->decimal('otros_descuentos', 10, 2)->default(0);
            $table->decimal('descuentos_bruto', 10, 2)->nullable();
            $table->decimal('monto_neto_pago', 10, 2)->nullable();
            $table->boolean('estado_planilla')->default(false);
            $table->unsignedBigInteger('trabajador_id');
            $table->timestamps();
            // Clave foránea
            $table->foreign('trabajador_id')->references('id')->on('datos_personals');
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calculo_planillas');
    }
};
