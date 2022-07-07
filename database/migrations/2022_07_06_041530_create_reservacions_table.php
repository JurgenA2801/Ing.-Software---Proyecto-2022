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
        Schema::create('reservacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->nullable()->index();
            $table->date('fechaInicio'); 
            $table->date('fechaCierre'); 
            $table->time('horaCierre'); 
            $table->string('estadoServicio'); 
            $table->integer('numeroVuelo');
            $table->integer('cantidadPasajeros'); 
            $table->integer('tarifa'); 
            $table->string('observaciones');


            
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
        Schema::dropIfExists('reservacions');
    }
};
