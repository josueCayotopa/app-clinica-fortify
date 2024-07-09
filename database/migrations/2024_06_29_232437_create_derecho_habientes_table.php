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
        Schema::create('derecho_habientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trabajador_id')->nullable();
            $table->unsignedBigInteger('tipo_documento_id')->nullable();
            $table->string('nombre_completo', 100)->nullable();
            $table->string('numero_documento', 15)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->char('sexo', 1)->nullable();
            $table->unsignedBigInteger('vinculo_familiar_id')->nullable();
            $table->unsignedBigInteger('documento_acredita_parternidad_id')->nullable();
            $table->string('numero_documento_acredita_paternidad', 15)->nullable();
            $table->char('situacion', 1)->nullable();
            $table->date('fecha_alta')->nullable();
            $table->unsignedBigInteger('tipo_baja_id')->nullable();
            $table->date('fecha_baja')->nullable();
            $table->string('numero_resolucion', 20)->nullable();
            $table->unsignedBigInteger('domicilio_id')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('correo_electronico', 50)->nullable();
            $table->unsignedBigInteger('via_id')->nullable();
            $table->string('nombre_via', 20)->nullable();
            $table->string('numero_via', 4)->nullable();
            $table->string('interior', 4)->nullable();
            $table->unsignedBigInteger('zona_id')->nullable();
            $table->string('nombre_zona', 20)->nullable();
            $table->string('referencia', 40)->nullable();
            $table->unsignedBigInteger('distrito_id')->nullable();
            $table->timestamps();
            $table->foreign('distrito_id')->references('id')->on('distritos');
            $table->foreign('zona_id')->references('id')->on('zonas');
            $table->foreign('via_id')->references('id')->on('vias');
            $table->foreign('trabajador_id')->references('id')->on('datos_personals');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
            $table->foreign('vinculo_familiar_id')->references('id')->on('vinculo_familiars');
            $table->foreign('documento_acredita_parternidad_id')->references('id')->on('documento_acredita_parternidads');
            
            // motivo_baja_d_h_s
            $table->foreign('tipo_baja_id')->references('id')->on('motivo_baja_d_h_s');
            $table->foreign('domicilio_id')->references('id')->on('domicilio_derecho_habientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('derecho_habientes');
    }
};
