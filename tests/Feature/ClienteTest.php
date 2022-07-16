<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\cliente;


class ClienteTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_crear_cliente(){ 
       
        $testCliente = [
            'cedula' => '123456789',
            'nombre'=> 'Jurgen',
            'correo'=> 'solomandalo@gmail.com'        
        ]; 

        $response = $this->post('/clienteGuardar', $testCliente); 
 
        $response->assertStatus(200);

        $this->assertDatabaseHas('clientes', ['cedula' => '123456789']);
        
    } 

    public function test_editar_cliente(){  
        $clienteParaActualizar = cliente::factory()->create();
        $clienteParaActualizar->save();  

        $testCliente = [
            'id'=> 1,
            'cedula' => '123456789',
            'nombre'=> 'Jurgen',
            'correo'=> 'solomandalo@gmail.com'              
        ]; 
        $response = $this->put('/clienteUpdate', $testCliente); 
 
        $response->assertStatus(200);

        $this->assertDatabaseHas('clientes', ['nombre' => 'Jurgen']);

    } 
   
    public function test_mostrar_todos_los_clientes(){ 

        $cliente = cliente::factory()->create(); 
        $cliente2 = cliente::factory()->create(); 
        $cliente3 = cliente::factory()->create(); 
        $cliente->save();
        $cliente2->save();
        $cliente3->save();
        $response = $this->get('/cliente');
        
        $response->assertStatus(200)->assertSee($cliente2->nombre);
        $this->assertDatabaseHas('clientes', ['cedula'=>$cliente->cedula]);
    
    }
    
}
