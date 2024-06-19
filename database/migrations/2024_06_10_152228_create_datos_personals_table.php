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
        Schema::create('datos_personals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_documento_id');
           
            $table->string('numero_documento', 15);
            $table->string('apellido_paterno', 40);
            $table->string('apellido_materno', 40);
            $table->string('nombres', 40);
            $table->date('fecha_nacimiento');
            $table->char('sexo', 1);
            $table->unsignedBigInteger('nacionalidad_id');
            $table->string('telefono', 10)->nullable();
            $table->string('correo_electronico', 50)->nullable();
            $table->char('essalud_vida', 1);
            $table->char('domiciliado', 1);
            $table->unsignedBigInteger('via_id');
            $table->string('nombre_via', 20)->nullable();
            $table->string('numero_via', 4)->nullable();
            $table->string('interior', 4)->nullable();
            $table->unsignedBigInteger('zona_id');
            $table->string('nombre_zona', 20)->nullable();
            $table->string('referencia', 40)->nullable();
            $table->unsignedBigInteger('distrito_id');

            $table->timestamps();
            // foreig key   
            $table->foreign('distrito_id')->references('id')->on('distritos')->onDelete('cascade');
            $table->foreign('zona_id')->references('id')->on('zonas')->onDelete('cascade');
            $table->foreign('via_id')->references('id')->on('vias')->onDelete('cascade');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidad')->onDelete('cascade');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datos_personals');
    }
};
