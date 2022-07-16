<?php

namespace Tests\Feature;

use App\Models\reservacion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\cliente; 
use App\Models\servicio;
use Illuminate\Support\Arr;
use Tests\TestCase;

class ReservacionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
  
    public function test_editar_reserva(){  


        $reservaParaActualizar = reservacion::factory()->create();
        $reservaParaActualizar->save(); //Guardo reserva con id = 1
        $testReserva = [
            'id' => 1,
            'fechaInicio' => date("Y/m/d"),
            'fechaCierre'=> date("Y/m/d"),
            'horaCierre'=> time(),
            'estadoServicio'=> 'Listo', 
            'numeroVuelo' => 15, 
            'cantidadPasajeros' =>20, 
            'tarifa'=> 5000, 
            'observaciones'=> 'No hay observaciones'
                  
        ]; 
        $response = $this->put('/reservacionUpdate', $testReserva); 
 
        $response->assertStatus(200);

        $this->assertDatabaseHas('reservacions', ['estadoServicio' => 'Listo']);

    } 

 
    public function test_mostrar_todas_las_reservas(){ 

        $reserva = reservacion::factory()->create(); 
        $reserva->save();
        $response = $this->get('/reservacion');
        
        $response->assertStatus(200)->assertSee($reserva->observaciones);
        $this->assertDatabaseHas('reservacions', ['tarifa'=>$reserva->tarifa]);
             
    }

    public function test_crear_reserva(){ 

        $testReserva = [
            'fechaInicio' => date("Y/m/d"),
            'fechaCierre'=> date("Y/m/d"),
            'horaCierre'=> time(),
            'estadoServicio'=> 'Listo', 
            'numeroVuelo' => 15, 
            'cantidadPasajeros' =>20, 
            'tarifa'=> 5000, 
            'observaciones'=> 'No hay observaciones'
                  
        ];
        $response = $this->post('/reservacionGuardar', $testReserva); 
 
        $response->assertStatus(200);

        $this->assertDatabaseHas('reservacions', ['numeroVuelo' => 15]);
    }




}

