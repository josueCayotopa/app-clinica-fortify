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
        Schema::create('documento_acredita_parternidads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vinculo_familiar_id');
            $table->string('descripcion', 100); 
            $table->timestamps();
            $table->foreign('vinculo_familiar_id')->references('id')->on('vinculo_familiars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documento_acredita_parternidads');
    }
};
