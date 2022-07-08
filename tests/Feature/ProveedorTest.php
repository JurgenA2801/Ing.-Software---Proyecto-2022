<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\proveedor; 
use App\Models\servicio;
use Tests\TestCase;

class ProveedorTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
  

    public function test_eliminar_proveedor(){ 
        $proveedor = proveedor::factory()->create(); 
        $proveedor2 = proveedor::factory()->create(); 
        $proveedor->eliminar($proveedor->id);
        $this->assertEquals(1, $proveedor->cantidadproveedor());
    } 
    public function test_mostrar_todas_las_proveedor(){ 

        $proveedor = proveedor::factory()->create(); 
        $proveedor2 = proveedor::factory()->create(); 
        $proveedor = proveedor::factory()->create(); 
        $this->assertEquals(3, $proveedor->cantidadproveedor());
    
    }
    public function test_agregar_proveedor(){ 
        $proveedor = proveedor::factory()->create(); 
        $this->assertEquals(true, $proveedor->agregar()); 
    } 

    public function test_editar_proveedor(){  
        $proveedor = proveedor::factory()->create(); 
        $proveedor->editar('10'); 
        $this->assertEquals('10', $proveedor->comisiones); 

    } 
}