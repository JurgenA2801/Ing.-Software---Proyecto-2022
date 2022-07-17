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
   
    public function test_mostrar_todos_los_gastos(){ 

        $gasto = gasto::factory()->create(); 
        $gasto2 = gasto::factory()->create(); 
        $gasto3 = gasto::factory()->create(); 
        $gasto->save();
        $gasto2->save();
        $gasto3->save();

        $response = $this->get('/gasto');
        
        $response->assertStatus(200)->assertSee($gasto2->descripcion);
        $this->assertDatabaseHas('gastos', ['monto'=>$gasto->monto]);


    
    }
    public function test_crear_gasto(){ 
        $testGasto = [
            'fecha' =>  date("Y/m/d"),
            'monto'=> 250000,
            'descripcion'=> 'gasto operativo excede el presupuesto'        
        ];  

        $response = $this->post('/gastoGuardar', $testGasto); 
 
        $response->assertStatus(200);

        $this->assertDatabaseHas('gastos', ['monto'=>250000]);
    } 

    public function test_editar_gasto(){  
        $gastoActualizar = gasto::factory()->create(); 
        $gastoActualizar->save();  

        $testGasto = [
            'id'=> 1,
            'fecha' =>  date("Y/m/d"),
            'monto'=> 250000,
            'descripcion'=> 'gasto operativo excede el presupuesto'        
        ];  

        $response = $this->put('/gastoUpdate', $testGasto); 
 
        $response->assertStatus(200);

        $this->assertDatabaseHas('gastos', ['descripcion' =>'gasto operativo excede el presupuesto']);

    }
}
