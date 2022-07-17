<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
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
  
    public function test_mostrar_todas_los_proveedores(){ 

        $proveedor = proveedor::factory()->create(); 
        $proveedor2 = proveedor::factory()->create(); 
        $proveedor3 = proveedor::factory()->create(); 

        $proveedor->save();
        $proveedor2->save();
        $proveedor3->save();

        $response = $this->get('/proveedor');
        
        $response->assertStatus(200)->assertSee($proveedor->nombre);
        $this->assertDatabaseHas('proveedors', ['correo'=>$proveedor3->correo]);
    
    }
    public function test_crear_proveedor(){ 
  
        $testProveedor = [
            'nombre' => 'LDA S.A',
            'correo' => 'solomandalo@gmail.com', 
            'observaciones' => 'Sin observaciones', 
            'comisiones' =>10000   
        ];  

        $response = $this->post('/proveedorGuardar', $testProveedor); 
 
        $response->assertStatus(200);

        $this->assertDatabaseHas('proveedors', ['nombre' => 'LDA S.A']);
    } 

    public function test_editar_proveedor(){  
        $proveedor = proveedor::factory()->create(); 
        $proveedor->save();
        
        $testProveedor = [
            'id'=> 1,
            'nombre' => 'LDA S.A',
            'correo' => 'solomandalo@gmail.com', 
            'observaciones' => 'Sin observaciones', 
            'comisiones' =>10000                
        ]; 
        $response = $this->put('/proveedorUpdate', $testProveedor); 
 
        $response->assertStatus(200);

        $this->assertDatabaseHas('proveedors', ['correo' => 'solomandalo@gmail.com']);

    } 
}