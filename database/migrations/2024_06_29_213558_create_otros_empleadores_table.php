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
        Schema::create('otros_empleadores', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('establecimientos_destaco_personal_id')->nullable();
            $table->foreign('establecimientos_destaco_personal_id')->references('id')->on('establecimientos_destaco_personals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otros_empleadores');
    }
};
