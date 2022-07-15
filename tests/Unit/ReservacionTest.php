<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\reservacion; 
use App\Models\cliente; 
use App\Models\servicio;

use function PHPUnit\Framework\isEmpty;

class ReservacionTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
  
      public function test_una_reserva_puede_tener_un_cliente()
    {
        $reserva = reservacion::factory()->create();
        $cliente = cliente::factory()->create();  
        $reserva->save(); 
        $cliente->save();
        $cliente->agregarReserva($reserva);
        
        $this->assertDatabaseHas('reservacions', ['cliente_id' => '1']);
    }  

    public function test_desasociar_reserva_de_un_cliente()
    {
        $reserva = reservacion::factory()->create();
        $cliente = cliente::factory()->create(); 
        $reserva->save(); 
        $cliente->save();
        $cliente->agregarReserva($reserva);
        $reserva->desasociarCliente(); 
        $this->assertDatabaseHas('reservacions', ['cliente_id' => null]);
       
    } 

    public function test_una_reserva_tiene_un_servicio()
    {
        $reserva = reservacion::factory()->create();
        $servicio = servicio::factory()->create(); 
        $reserva->save(); 
        $servicio->save();
        $reserva->agregarServicio($servicio->id); 
        $this->assertDatabaseHas('reservacion_servicio', ['reservacion_id' => 1, 'servicio_id'=>1]);


    } 

    public function test_se_puede_desasociar_un_servicio_de_una_reserva(){ 

        $reserva = reservacion::factory()->create();
        $servicio = servicio::factory()->create(); 
        $reserva->save(); 
        $servicio->save();
        $reserva->eliminarServicio($servicio->id); 
        $this->assertDatabaseMissing('reservacion_servicio', ['reservacion_id' => 1, 'servicio_id'=>1]);
        
    }


}


