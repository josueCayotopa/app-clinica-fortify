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
        Schema::create('afpsdescuentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('afp_id')->constrained('afps')->onDelete('cascade');
            $table->foreignId('tipo_descuento_id')->constrained('tipos_descuentos')->onDelete('cascade');
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
        Schema::dropIfExists('afpsdescuentos');
    }
};
