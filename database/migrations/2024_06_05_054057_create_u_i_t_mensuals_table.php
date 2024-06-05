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
        Schema::create('u_i_t_mensuals', function (Blueprint $table) {
            $table->integer('mes_proceso')->length(2)->primary();
            $table->decimal('imp_valor_uit', 3, 0)->nullable();
            $table->integer('ano_proceso')->length(4)->nullable(); // Ajusta la longitud y el tipo de datos
            $table->foreign('ano_proceso')->references('ano_proceso')->on('u_i_t_s');
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
        Schema::dropIfExists('u_i_t_mensuals');
    }
};
