<?php

namespace Tests\Unit;

use App\Models\proveedor;
use App\Models\servicio;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ServicioTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */

      public function test_asociar_servicio_con_su_proveedor()
    {
        $servicio= servicio::factory()->create();
        $proveed = proveedor::factory()->create(); 
        $proveed->agregarservicio($servicio);
        
        $this->assertDatabaseHas('servicios', ['proveedor_id' => $proveed->id]);
    }

    public function test_se_puede_desasociar_un_servicio_de_un_proveedor(){ 
        $servicio = servicio::factory()->create();
        $proveedor = proveedor::factory()->create(); 
        $servicio->save(); 
        $proveedor->save();
        $proveedor->agregarservicio($servicio);
        $servicio->desasociarproveedor();

        $this->assertDatabaseMissing('servicios', ['proveedor_id' => $proveedor->id]); 
    }
   
}
