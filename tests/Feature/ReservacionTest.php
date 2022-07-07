<?php

namespace Tests\Feature;

use App\Models\reservacion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\cliente; 
use App\Models\servicio;
use Tests\TestCase;

class ReservacionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
  

    public function test_una_reserva_puede_tener_un_cliente()
    {
        $reserva = reservacion::factory()->create();
        $cliente = cliente::factory()->create(); 
        $cliente->agregarReserva($reserva);
        
        $this->assertEquals(1, $reserva->countCliente());
    }  

    public function test_desasociar_reserva_de_un_cliente()
    {
        $reserva = reservacion::factory()->create();
        $cliente = cliente::factory()->create(); 
        $cliente->agregarReserva($reserva);
        $reserva->desasociarCliente();
        $this->assertEquals(0, $reserva->countCliente()); 
    } 

    public function test_agregar_reserva(){ 
        $reserva = reservacion::factory()->create(); 
        $this->assertEquals(true, $reserva->agregar()); 
    } 

    public function test_editar_reserva(){  
        $reserva = reservacion::factory()->create(); 
        $reserva->editar('10'); 
        $this->assertEquals('10', $reserva->numeroVuelo); 

    } 

    public function test_eliminar_reserva(){ 
        $reserva = reservacion::factory()->create(); 
        $reserva2 = reservacion::factory()->create(); 
        $reserva->eliminar($reserva->id);
        $this->assertEquals(1, $reserva->cantidadReserva());
    } 

    public function test_mostrar_todas_las_reservas(){ 

        $reserva = reservacion::factory()->create(); 
        $reserva2 = reservacion::factory()->create(); 
        $reserva3 = reservacion::factory()->create(); 
        $this->assertEquals(3, $reserva->cantidadReserva());
    
    }



    // public function test_una_reserva_tiene_un_servicio()
    // {
    //     $reserva = reservacion::factory()->create();
    //     $servicio = servicio::factory()->create(); 
    //     $reserva->agregarServicio($servicio); 
    //     $this->assertEquals(1, $reserva->countServicio());


    // }
}

