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
            $table->id(); 
            $table->integer('ano_proceso')->length(4)->unsigned();
            $table->integer('mes_proceso')->length(2)->unsigned();
            $table->decimal('imp_valor_uit', 10, 2)->nullable();
            $table->timestamps();

            
            $table->foreign('ano_proceso')->references('ano_proceso')->on('u_i_t_s')->onDelete('cascade');

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
