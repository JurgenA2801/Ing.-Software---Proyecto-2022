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
        Schema::create('gastos', function (Blueprint $table) {
            $table->id(); 
            //$table->foreignId('TipoDeGasto_id')->nullable()->index();
            $table->foreignId('reservacion_id')->nullable()->index();
            $table->date('fecha');
            $table->integer('monto'); 
            $table->string('descripcion');
            //$table->foreignId('gastoVehiculo_id')->nullable()->index();
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
        Schema::dropIfExists('gastos');
    }
};
