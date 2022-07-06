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

    // public function test_una_reserva_tiene_un_servicio()
    // {
    //     $reserva = reservacion::factory()->create();
    //     $servicio = servicio::factory()->create(); 
    // }
}

