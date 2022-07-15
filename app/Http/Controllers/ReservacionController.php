<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservacion;
use App\Models\servicio;
use Illuminate\Support\Facades\DB;

class ReservacionController extends Controller
{
    public function index(){ 

        $todasLasReservas = reservacion::all();
        return view('reservacion.index', compact('todasLasReservas'));


    } 

    public function guardar(Request $request) { 

        $reservacion = new Reservacion();
        $reservacion->fechaInicio = $request->fechaInicio; 
        $reservacion->fechaCierre = $request->fechaCierre; 
        $reservacion->horaCierre = $request->horaCierre; 
        $reservacion->estadoServicio = $request->estadoServicio; 
        $reservacion->numeroVuelo = $request->numeroVuelo;  
        $reservacion->cantidadPasajeros = $request->cantidadPasajeros;
        $reservacion->tarifa = $request->tarifa; 
        $reservacion->observaciones = $request->observaciones;
        $servicio = servicio::factory()->create(); 
        $servicio->save();
        $reservacion->save();
        $reservacion->agregarServicio($servicio->id);
              
    }  

    public function update(Request $request){ 

        DB::table('reservacions')
            ->where('id', 1)
            ->update(['fechaInicio' => $request->fechaInicio,
            'fechaCierre'=> $request->fechaCierre, 
            'horaCierre'=>  $request->horaCierre, 
            'estadoServicio'=>$request->estadoServicio, 
            'numeroVuelo'=>$request->numeroVuelo, 
            'cantidadPasajeros'=> $request->cantidadPasajeros, 
            'tarifa' => $request->tarifa,
            'observaciones' => $request->observaciones 
        ]);


    }

}
