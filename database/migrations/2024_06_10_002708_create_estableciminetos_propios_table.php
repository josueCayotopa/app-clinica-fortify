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
        Schema::create('estableciminetos_propios', function (Blueprint $table) {
            $table->string('codigo_establecimiento', 4)->primary(); // Primary Key
            $table->unsignedBigInteger('tipo_establecimiento_id');
            $table->foreign('tipo_establecimiento_id')->references('id')->on('tipo_establecimiento')->onDelete('cascade');
            $table->string('denominacion_establecimiento', 40)->notNull();
            $table->char('centro_riesgo', 1)->notNull();
            $table->decimal('tasa_sctr_essalud', 3, 2)->notNull();
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
        Schema::dropIfExists('estableciminetos_propios');
    }
};
