<?php

namespace Tests\Unit;

use App\Models\rol;
use App\Models\usuario;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class UsuarioTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     *
     * @return void
     */ 

        public function test_un_usuario_tiene_un_rol()
    {
        $usuario = usuario::factory()->create();
        $rol = rol::factory()->create(); 
        $usuario->save(); 
        $rol->save();

        $rol->agregarUsuario($usuario);
        
        $this->assertDatabaseHas('usuarios', ['rol_id' => 1]);
       
    } 

       public function test_desasociar_un_usuario_de_su_rol(){ 

        $usuario = usuario::factory()->create();
        $rol = rol::factory()->create(); 

        $usuario->save(); 
        $rol->save();

        $rol->agregarUsuario($usuario); 
        $usuario->desasociar_usuario_de_rol();

        $this->assertDatabaseMissing('usuarios', ['rol_id' => 1]);
 
    } 
   
}
