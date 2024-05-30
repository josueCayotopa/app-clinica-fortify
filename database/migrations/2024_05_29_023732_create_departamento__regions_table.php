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
        Schema::create('departamento__regions', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 10)->notNull(); 
            $table->string('descripcion', 255)->notNull();
            $table->unsignedBigInteger('nacionalidad_id'); 
            $table->timestamps();
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidad')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departamento__regions');
    }
};
