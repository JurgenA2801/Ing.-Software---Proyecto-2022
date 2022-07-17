<?php

namespace App\Http\Controllers;

use App\Models\proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorController extends Controller
{
    public function index(){ 
        $listaDeTodosLosProveedores = proveedor::all();
        return view('proveedor.index', compact('listaDeTodosLosProveedores'));
    }

    public function guardar(Request $request) { 

        $proveedor = new proveedor();
        $proveedor->nombre = $request->nombre; 
        $proveedor->correo = $request->correo; 
        $proveedor->comisiones = $request->comisiones; 
        $proveedor->observaciones = $request->observaciones;
        $proveedor->save(); 
    } 

    public function update(Request $request){ 

        DB::table('proveedors')
            ->where('id', $request->id)
            ->update(['nombre' => $request->nombre,
            'correo' => $request->correo, 
            'observaciones' => $request->observaciones, 
            'comisiones' =>$request->comisiones 
        ]);


    }
}
