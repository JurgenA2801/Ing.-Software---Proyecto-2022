<?php

namespace App\Http\Controllers;

use App\Models\gasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GastoController extends Controller
{
    public function index(){ 
        $todosLosGastos = gasto::all();
        return view('gasto.index', compact('todosLosGastos'));
    }

    public function guardar(Request $request) { 

        $gasto = new gasto();
        $gasto->fecha = $request->fecha; 
        $gasto->monto = $request->monto; 
        $gasto->descripcion = $request->descripcion; 
        $gasto->save();

    } 

    public function update(Request $request){ 

        DB::table('gastos')
            ->where('id', $request->id)
            ->update(['fecha' => $request->fecha,
            'monto'=> $request->monto, 
            'descripcion'=>  $request->descripcion,
        ]);


    }
}
