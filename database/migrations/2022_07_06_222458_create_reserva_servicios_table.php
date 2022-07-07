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
        Schema::create('reserva_servicios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_id')->nullable()->index();
            $table->foreignId('reservacion_id')->nullable()->index();
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
        Schema::dropIfExists('reserva_servicios');
    }
};
