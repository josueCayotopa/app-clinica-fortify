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
        Schema::create('tipo_trabajadors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id');
            $table->string('codigo_sunat', 10)->notNull(); 
            $table->string('descripcion')->nullable();
            $table->string('nivel', 15)->nullable(); 
            $table->decimal('factor_hora_extra', 8, 2)->nullable(); 
            $table->decimal('factor_dia_viaje', 8, 2)->nullable();
            $table->timestamps();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->boolean('estado')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_trabajadors');
    }
};
