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
        Schema::create('personal_terceros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('establecimientos_destaco_personal_id')->nullable();
            $table->unsignedBigInteger('sctrsalud_id')->nullable();
            $table->unsignedBigInteger('sctrpension_id')->nullable();
            $table->timestamps();
            $table->foreign('establecimientos_destaco_personal_id')->references('id')->on('establecimientos_destaco_personals');
            $table->foreign('sctrsalud_id')->references('id')->on('s_c_t_r_saluds')->onDelete('cascade');
            $table->foreign('sctrpension_id')->references('id')->on('s_c_t_r_pensions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_terceros');
    }
};
