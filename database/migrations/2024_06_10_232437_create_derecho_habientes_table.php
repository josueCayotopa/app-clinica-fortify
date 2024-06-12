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
            $table->unsignedBigInteger('trabajador_id');
            $table->unsignedBigInteger('tipo_documento_id');
            $table->string('nombre_completo', 100);   
            $table->string('numero_documento', 15);
            $table->date('fecha_nacimiento')->nullable();
            $table->char('sexo', 1)->nullable();
            $table->unsignedBigInteger('vinculo_familiar_id');
            $table->unsignedBigInteger('documento_acredita_parternidad_id');
            $table->string('numero_documento_acredita_paternidad', 15);
            $table->char('situacion', 1)->nullable();
            $table->date('fecha_alta')->nullable();
            $table->unsignedBigInteger('tipo_baja_id');
            $table->date('fecha_baja')->nullable();
            $table->string('numero_resolucion', 20)->nullable();
            $table->unsignedBigInteger('domicilio_id');
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
            $table->foreign('distrito_id')->references('id')->on('distritos')->onDelete('cascade');
            $table->foreign('zona_id')->references('id')->on('zonas')->onDelete('cascade');
            $table->foreign('via_id')->references('id')->on('vias')->onDelete('cascade');

            $table->foreign('trabajador_id')->references('id')->on('personals')->onDelete('cascade');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onDelete('cascade');
            $table->foreign('vinculo_familiar_id')->references('id')->on('vinculo_familiars')->onDelete('cascade');
            $table->foreign('documento_acredita_parternidad_id')->references('id')->on('documento_acredita_parternidads')->onDelete('cascade');
            // motivo_baja_d_h_s
            $table->foreign('tipo_baja_id')->references('id')->on('motivo_baja_d_h_s')->onDelete('cascade');
            $table->foreign('domicilio_id')->references('id')->on('domicilio_derecho_habientes')->onDelete('cascade');

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
