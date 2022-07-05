<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker; 
use App\Models\usuario;
use App\Models\rol;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Tests\TestCase;

class UsuarioTest extends TestCase
{

    use RefreshDatabase;


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_un_usuario_tiene_un_rol()
    {
        $usuario = usuario::factory()->create();
        $rol = rol::factory()->create(); 
        $rol->agregar($usuario);
        
        $this->assertEquals(1, $usuario->count());
       
    } 

    public function test_se_puede_agregar_un_usuario(){ 

        $nuevoUsuario = usuario::factory()->create(); 
        $this->assertEquals(true, $nuevoUsuario->agregar());
    }  

     public function test_listar_todos_los_usuarios(){ 
        
        $usuario = usuario::factory()->create();
        $usuario2 = usuario::factory()->create();
        $this->assertEquals(2, $usuario->cantidad_usuarios());

    } 

    public function test_se_puede_eliminar_un_usuario(){ 

        $usuario = usuario::factory()->create(); 
        $usuario->eliminar_usuario($usuario->id);
        $this->assertEquals(0, $usuario->cantidad_usuarios());

    } 

    public function test_desasociar_un_usuario_de_su_rol(){ 

        $usuario = usuario::factory()->create();
        $rol = rol::factory()->create(); 
        $rol->agregar($usuario); 
        $usuario->desasociar_usuario_de_rol(); 
        $this->assertEquals(0, $usuario->count());
        
    } 
  
    public function test_editar_usuarios(){ 

        $usuario = usuario::factory()->create(); 
        $usuario->editarUsuario($usuario); 
        $this->assertEquals('Jurgen', $usuario->name);


    }
}
