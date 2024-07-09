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
        Schema::create('regimen_afps', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique()->nullable();
            $table->foreignId('regimen_id')->constrained('regimen_pencionarios');
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
        Schema::dropIfExists('regimen_afps');
    }
};
