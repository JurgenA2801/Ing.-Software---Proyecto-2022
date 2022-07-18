<?php

namespace App\Http\Controllers;

use App\Models\servicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicioController extends Controller
{
    public function index(){ 
        $losServicios = servicio::all();
        return view('servicio.index', compact('losServicios'));
    } 

    public function guardar(Request $request){ 

        $servicio = new servicio();
        $servicio->fecha = $request->fecha; 
        $servicio->observaciones = $request->observaciones; 
        $servicio->save();
    } 

    public function update(Request $request)
    { 
        DB::table('servicios')
            ->where('id', $request->id)
            ->update(['fecha' => $request->fecha,
            'observaciones'=> $request->observaciones, 
        ]);
    }
}
