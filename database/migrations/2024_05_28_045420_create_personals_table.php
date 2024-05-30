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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->enum('sexo', ['M', 'F']);
            $table->date('fecha_nacimiento');
            $table->enum('estado_civil', ['Soltero', 'Casado', 'Divorciado', 'Viudo']);
            $table->string('telefono')->nullable();
            $table->integer('numero_hijos')->default(0);
            $table->string('numero_ruc')->nullable();
            $table->string('brevete')->nullable();
            $table->string('numero_documento');
            $table->unsignedBigInteger('tipo_documento_id');
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('tipo_personal_id');
            $table->boolean('adelanto_quincena')->default(false);
            $table->enum('estado', ['Activo', 'Inactivo'])->default('Activo');
            $table->timestamps();

            // Definir claves foráneas
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onDelete('cascade');
            $table->foreign('tipo_personal_id')->references('id')->on('tipo_personals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personals');
    }
};
