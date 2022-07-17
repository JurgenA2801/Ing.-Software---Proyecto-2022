<?php

namespace Tests\Unit;

use App\Models\gasto;
use App\Models\reservacion;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GastoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_un_gasto_tiene_su_reserva()
    {
        $reserva = reservacion::factory()->create();
        $gasto = gasto::factory()->create();  
        $reserva->save(); 
        $gasto->save();
        $reserva->agregarGasto($gasto);
        
        $this->assertDatabaseHas('gastos', ['reservacion_id' => $gasto->reservacion_id]);
    }  

    public function test_se_puede_desasociar_un_gasto_de_una_reserva(){ 
     
        $reserva = reservacion::factory()->create();
        $gasto = gasto::factory()->create();  
        $reserva->save(); 
        $gasto->save();
        $reserva->agregarGasto($gasto); 
        $gasto->desasociarReserva();
        
        $this->assertDatabaseMissing('gastos', ['reservacion_id' => $reserva->id]);

    }
}
