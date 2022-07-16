<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index(){ 
        $losClientes = cliente::all();
        return view('cliente.index', compact('losClientes'));
    }

    public function guardar(Request $request) { 

        $cliente = new cliente();
        $cliente->cedula = $request->cedula; 
        $cliente->nombre = $request->nombre; 
        $cliente->correo = $request->correo; 
        $cliente->save();
      
              
    }   

    public function update(Request $request){ 

        DB::table('clientes')
            ->where('id', $request->id)
            ->update(['cedula' => $request->cedula,
            'nombre'=> $request->nombre, 
            'correo'=>  $request->correo,
        ]);


    }
}
