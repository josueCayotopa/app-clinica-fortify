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
        Schema::create('modalidad_formativas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_documento_id');
            $table->string('numero_documento', 15);
            $table->unsignedBigInteger('seguro_medico_id');
            $table->unsignedBigInteger('nivel_educativo_id');
            $table->unsignedBigInteger('ocupacion_id');
            $table->char('madre_responsabilidad', 1)->nullable();
            $table->char('discapacidad', 1)->nullable();
            $table->unsignedBigInteger('institucion_id');
            $table->char('horario_nocturno', 1)->nullable();
            $table->timestamps();
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onDelete('cascade');
            $table->foreign('seguro_medico_id')->references('id')->on('seguro_medicos')->onDelete('cascade');
            //nivel_educativos
            $table->foreign('nivel_educativo_id')->references('id')->on('nivel_educativos')->onDelete('cascade');
            // 
            $table->foreign('ocupacion_id')->references('id')->on('ocupacions')->onDelete('cascade');
            // 
            $table->foreign('institucion_id')->references('id')->on('institucions')->onDelete('cascade');
        
        
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modalidad_formativas');
    }
};
