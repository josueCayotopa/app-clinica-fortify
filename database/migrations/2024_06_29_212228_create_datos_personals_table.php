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
            $table->unsignedBigInteger('tipo_documento_id')->nullable(); 
            $table->string('numero_documento', 20)->nullable(); 
            $table->string('apellido_paterno', 100)->nullable(); 
            $table->string('apellido_materno', 100)->nullable(); 
            $table->string('nombres', 100); 
            $table->string('imagen',255)->nullable(); 
            $table->string('curriculum',255)->nullable(); 
            $table->date('fecha_nacimiento')->nullable(); 
            $table->char('sexo', 1)->nullable(); 
            $table->unsignedBigInteger('nacionalidad_id')->nullable(); 
            $table->string('telefono', 10)->nullable();
            $table->string('correo_electronico', 50)->nullable();
            $table->char('essalud_vida', 1)->nullable(); 

            
            $table->char('domiciliado', 1)->nullable(); 
            $table->unsignedBigInteger('via_id')->nullable(); 
            $table->string('nombre_via', 20)->nullable();
            $table->string('numero_via', 4)->nullable();
            $table->string('interior', 4)->nullable();
            $table->unsignedBigInteger('zona_id')->nullable(); 
            $table->string('nombre_zona', 20)->nullable();
            $table->string('referencia', 40)->nullable();
            $table->unsignedBigInteger('distrito_id')->nullable(); 
            // trabajadores
            $table->unsignedBigInteger('trabajador_id')->nullable(); 
            $table->unsignedBigInteger('pensionista_id')->nullable(); 
            $table->unsignedBigInteger('trabajador_cuarta_categoria_id')->nullable(); 
            $table->unsignedBigInteger('modaliad_formativa_id')->nullable(); 
            $table->timestamps();
            
            // foreig key   
            $table->foreign('distrito_id')->references('id')->on('distritos');
            $table->foreign('zona_id')->references('id')->on('zonas');
            $table->foreign('via_id')->references('id')->on('vias');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidad');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
            
            // trabajadores
            $table->foreign('trabajador_id')->references('id')->on('trabajadors');
            $table->foreign('pensionista_id')->references('id')->on('pencionistas');
            $table->foreign('trabajador_cuarta_categoria_id')->references('id')->on('trabajador_cuarta_categorias');
            $table->foreign('modaliad_formativa_id')->references('id')->on('modalidad_formativas');
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
