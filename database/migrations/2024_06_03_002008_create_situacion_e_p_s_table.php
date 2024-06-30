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
        Schema::create('situacion_e_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_sunat')->nullable();
            $table->string('descripcion')->nullable();
            $table->boolean('afiliado_eps')->default(true)->nullable();
            $table->boolean('estado')->nullable();
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
        Schema::dropIfExists('situacion_e_p_s');
    }
};
