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
        Schema::create('personal_terceros', function (Blueprint $table) {
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
            $table->char('domiciliado', 1);
            $table->unsignedBigInteger('via_id')->nullable();
            $table->string('nombre_via', 20)->nullable();
            $table->string('numero_via', 4)->nullable();
            $table->string('interior', 4)->nullable();
            $table->unsignedBigInteger('zona_id')->nullable();
            $table->string('nombre_zona', 20)->nullable();
            $table->string('referencia', 40)->nullable();
            $table->unsignedBigInteger('distrito_id')->nullable();
            $table->string('ruc', 11)->nullable();
            $table->unsignedBigInteger('sctrsalud_id')->nullable();
            $table->unsignedBigInteger('sctrpension_id')->nullable();

            $table->timestamps();
            // foreig key   
            $table->foreign('distrito_id')->references('id')->on('distritos')->onDelete('cascade');
            $table->foreign('zona_id')->references('id')->on('zonas')->onDelete('cascade');
            $table->foreign('via_id')->references('id')->on('vias')->onDelete('cascade');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidad')->onDelete('cascade');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onDelete('cascade');
            $table->foreign('sctrsalud_id')->references('id')->on('s_c_t_r_saluds')->onDelete('cascade');
            $table->foreign('sctrpension_id')->references('id')->on('s_c_t_r_pensions')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_terceros');
    }
};
