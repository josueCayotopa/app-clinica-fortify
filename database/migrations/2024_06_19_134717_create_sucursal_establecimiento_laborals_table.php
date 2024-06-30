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
        Schema::create('sucursal_establecimiento_laborals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sucursalpropio_id')->nullable();
            $table->unsignedBigInteger('empresa_me_dastacan_id')->nullable();
            $table->timestamps();
            $table->foreign('sucursalpropio_id')->references('id')->on('sucursals');
            $table->foreign('empresa_me_dastacan_id')->references('id')->on('empresa_me_destacans');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sucursal_establecimiento_laborals');
    }
};
