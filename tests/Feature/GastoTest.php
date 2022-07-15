<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\gasto; 
use Tests\TestCase;


class GastoTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_eliminar_gasto(){ 
        $gasto = gasto::factory()->create(); 
        $gasto2 = gasto::factory()->create(); 
        $gasto->eliminar($gasto->id);
        $this->assertEquals(1, $gasto->cantidad_gasto());
    } 
    public function test_mostrar_todos_los_gastos(){ 

        $gasto = gasto::factory()->create(); 
        $gasto2 = gasto::factory()->create(); 
        $gasto = gasto::factory()->create(); 
        $this->assertEquals(3, $gasto->cantidad_gasto());
    
    }
    public function test_agregar_gasto(){ 
        $gasto = gasto::factory()->create(); 
        $this->assertEquals(true, $gasto->save()); 
    } 

    public function test_editar_gasto(){  
        $gasto = gasto::factory()->create(); 
        $gasto->editar('50000'); 
        $this->assertEquals('50000', $gasto->monto); 

    }
}
