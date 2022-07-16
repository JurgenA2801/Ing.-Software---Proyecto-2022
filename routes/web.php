<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReservacionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}); 

Route::get('reservacion', [ReservacionController::class, 'index']) -> name('reserva'); 
Route::post('reservacionGuardar', [ReservacionController::class, 'guardar']) -> name('reservaGuardar'); 
Route::put('reservacionUpdate', [ReservacionController::class, 'update']) -> name('reservaUpdate'); 

//rutas cliente  
Route::post('clienteGuardar', [ClienteController::class, 'guardar']) -> name('clienteGuardar'); 
Route::get('cliente', [ClienteController::class, 'index']) -> name('cliente'); 
Route::put('clienteUpdate', [ClienteController::class, 'update']) -> name('clienteUpdate'); 

