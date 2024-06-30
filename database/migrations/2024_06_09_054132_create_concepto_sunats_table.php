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
        Schema::create('concepto_sunats', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 6);
            $table->string('descripcion', 100)->nullable();
            $table->char('essalud_seguro_regular_trabajador', 1)->nullable();
            $table->char('essalud_cbssp_seg_trab_pesquero', 1)->nullable();
            $table->char('essalud_seguro_agrario_acuicultor', 1)->nullable();
            $table->char('essalud_sctr', 1)->nullable();
            $table->char('impuesto_extraord_de_solidaridad', 1)->nullable();
            $table->char('fondo_derechos_sociales_del_artista', 1)->nullable();
            $table->char('senati', 1)->nullable();
            $table->char('sistema_nacional_de_pensiones_1999', 1)->nullable();
            $table->char('sistema_privado_de_pensiones', 1)->nullable();
            $table->char('renta_5ta_categoría_retenciones', 1)->nullable();
            $table->char('essalud_seguro_regular_pensionista', 1)->nullable();
            $table->char('contrib_solidaria_asistencia previs', 1)->nullable();
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
        Schema::dropIfExists('concepto_sunats');
    }
};
