<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\proveedor; 
use App\Models\servicio;
use Tests\TestCase;

class ServicioTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
  
    public function test_mostrar_todos_los_servicios(){ 

        $servicio = servicio::factory()->create(); 
        $servicio2 = servicio::factory()->create(); 
        $servicio->save(); 
        $servicio2->save();

        $response = $this->get('/servicio');
        
        $response->assertStatus(200)->assertSee($servicio->id);
        $this->assertDatabaseHas('servicios', ['observaciones'=>$servicio2->observaciones]);
    
    }
    public function test_crear_servicio(){ 
       
        $testServicio= [
            'fecha' => date("Y/m/d"), 
            'observaciones' => 'Servicio con un 1 mes de vigencia'   
        ]; 

        $response = $this->post('/servicioGuardar', $testServicio); 
 
        $response->assertStatus(200);

        $this->assertDatabaseHas('servicios', ['observaciones' => 'Servicio con un 1 mes de vigencia']);

    } 

    public function test_editar_servicio(){  
        $servicio = servicio::factory()->create(); 
        $servicio->save();  

        $testServicio= [
            'id'=>1,
            'fecha' => date("Y/m/d"), 
            'observaciones' => 'Servicio con un 1 mes de vigencia'   
        ];  

        $response = $this->put('/servicioUpdate', $testServicio); 
 
        $response->assertStatus(200);

        $this->assertDatabaseHas('servicios', ['observaciones'=>'Servicio con un 1 mes de vigencia']);


       

    } 
}