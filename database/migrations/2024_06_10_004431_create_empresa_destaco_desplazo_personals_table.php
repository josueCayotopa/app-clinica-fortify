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
        Schema::create('empresa_destaco_desplazo_personals', function (Blueprint $table) {
            $table->string('ruc', 11)->primary(); // Primary Key
            $table->string('razon_social', 100)->notNull();
            $table->unsignedBigInteger('codigo_actividad_id');
            $table->foreign('codigo_actividad_id')->references('id')->on('tipo_de_actividad')->onDelete('cascade');
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
        Schema::dropIfExists('empresa_destaco_desplazo_personals');
    }
};
