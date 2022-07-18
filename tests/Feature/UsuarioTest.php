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

    public function test_se_puede_crear_un_usuario(){ 

        $testUsuario = [
            'name' => 'Jurgen',
            'password'=> '1284y374esdnf'          
        ];  

        $response = $this->post('/usuarioGuardar', $testUsuario); 
 
        $response->assertStatus(200);

        $this->assertDatabaseHas('usuarios', ['name' => 'Jurgen']);
       
    }  

     public function test_listar_todos_los_usuarios(){ 
        
        $usuario = usuario::factory()->create();
        $usuario2 = usuario::factory()->create(); 
        $usuario->save(); 
        $usuario2->save();
       
        $response = $this->get('/usuario');
        
        $response->assertStatus(200)->assertSee($usuario->id);
        $this->assertDatabaseHas('usuarios', ['name'=>$usuario2->name]);

    }  

        public function test_editar_usuarios(){ 

        $usuario = usuario::factory()->create(); 
        $usuario->save();

        $testUsuario = [
            'id'=> 1,
            'name' => 'Jurgen',
            'password'=> '1284y374esdnf'          
        ];  

        $response = $this->put('/usuarioUpdate', $testUsuario); 
 
        $response->assertStatus(200);

        $this->assertDatabaseHas('usuarios', ['password' => '1284y374esdnf']);
  


    }

    public function test_se_puede_eliminar_un_usuario(){ 

        $usuario = usuario::factory()->create(); 
        $usuario->save();

        $idAEliminar = [
            'id'=> 1,       
        ];  

        $response = $this->delete('/usuarioDelete', $idAEliminar); 
 
        $response->assertStatus(200);

        $this->assertDatabaseMissing('usuarios', ['id' => 1]);

    } 

}
