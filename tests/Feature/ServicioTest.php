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
  

    public function test_una_servicio_puede_tener_un_proveedores()
    {
        $servic= servicio::factory()->create();
        $proveed = proveedor::factory()->create(); 
        $proveed->agregarservicio($servic);
        
        $this->assertEquals(1, $servic->countproveedor());
    }

    public function test_se_puede_desasociar_un_servicio_de_una_proveedor(){ 
        $servicio = servicio::factory()->create();
        $proveedor = proveedor::factory()->create(); 
        $proveedor->agregarservicio($servicio);
        $servicio->desasociarproveedor();
        $this->assertEquals(0, $servicio->countproveedor()); 

        
    }
    public function test_eliminar_servicio(){ 
        $servicio = servicio::factory()->create(); 
        $servicio2 = servicio::factory()->create(); 
        $servicio->eliminar($servicio->id);
        $this->assertEquals(1, $servicio->cantidadservicio());
    } 
    public function test_mostrar_todas_las_servicios(){ 

        $servicio = servicio::factory()->create(); 
        $servicio2 = servicio::factory()->create(); 
        $servicio3 = servicio::factory()->create(); 
        $this->assertEquals(3, $servicio->cantidadservicio());
    
    }
    public function test_agregar_servicio(){ 
        $servicio = servicio::factory()->create(); 
        $this->assertEquals(true, $servicio->agregar()); 
    } 

    public function test_editar_servicio(){  
        $servicio = servicio::factory()->create(); 
        $servicio->editar('10'); 
        $this->assertEquals('10', $servicio->fecha); 

    } 
}