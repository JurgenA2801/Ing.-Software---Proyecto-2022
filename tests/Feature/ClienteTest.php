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
    public function test_agregar_cliente(){ 
        $cliente = cliente::factory()->create(); 
        $this->assertEquals(true, $cliente->save()); 
    } 

    public function test_editar_cliente(){  
        $cliente = cliente::factory()->create(); 
        $cliente->editar('402460889'); 
        $this->assertEquals('402460889', $cliente->cedula); 

    } 
    public function test_eliminar_cliente(){ 
        $cliente = cliente::factory()->create(); 
        $cliente2 = cliente::factory()->create(); 
        $cliente->eliminar($cliente->id);
        $this->assertEquals(1, $cliente->cantidad_cliente());
    }
    public function test_mostrar_todas_los_clientes(){ 

        $cliente = cliente::factory()->create(); 
        $cliente2 = cliente::factory()->create(); 
        $cliente3 = cliente::factory()->create(); 
        $this->assertEquals(3, $cliente->cantidad_cliente());
    
    }
    
}
