<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class UsuarioController extends Controller
{
    public function index(){ 
        $listaDeUsuarios = usuario::all();
        return view('usuario.index', compact('listaDeUsuarios'));
    }

    public function guardar(Request $request)
    {
        $nuevoUsuario = new usuario();
        $nuevoUsuario->name = $request->name; 
        $nuevoUsuario->password = $request->password; 
        $nuevoUsuario->save();
    } 

    public function update(Request $request)
    { 
        DB::table('usuarios')
            ->where('id', $request->id)
            ->update(['name' => $request->name,
            'password'=> $request->password 
        ]);
    } 

    public function delete(Request $request)
    { 
        DB::table('usuarios')
        ->where('id', $request->id)
        ->delete();
    } 


}
