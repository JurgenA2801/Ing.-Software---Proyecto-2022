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
        Schema::create('reservacion_servicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservacion_id')->references('id')->on('reservacions')->onDelete('cascade')->nullable();
            $table->foreignId('servicio_id')->references('id')->on('servicios')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('reservacion_servicio');
    }
};
