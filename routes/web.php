<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReservacionController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UsuarioController;
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
//rutas reservacion
Route::get('reservacion', [ReservacionController::class, 'index']) -> name('reserva'); 
Route::post('reservacionGuardar', [ReservacionController::class, 'guardar']) -> name('reservaGuardar'); 
Route::put('reservacionUpdate', [ReservacionController::class, 'update']) -> name('reservaUpdate'); 

//rutas cliente  
Route::post('clienteGuardar', [ClienteController::class, 'guardar']) -> name('clienteGuardar'); 
Route::get('cliente', [ClienteController::class, 'index']) -> name('cliente'); 
Route::put('clienteUpdate', [ClienteController::class, 'update']) -> name('clienteUpdate'); 

//rutas gastos 
Route::post('gastoGuardar', [GastoController::class, 'guardar']) -> name('gastoGuardar'); 
Route::get('gasto', [GastoController::class, 'index']) -> name('gasto'); 
Route::put('gastoUpdate', [GastoController::class, 'update']) -> name('gastoUpdate');

//rutas proveedors 
Route::post('proveedorGuardar', [ProveedorController::class, 'guardar']) -> name('proveedorGuardar'); 
Route::get('proveedor', [ProveedorController::class, 'index']) -> name('proveedor'); 
Route::put('proveedorUpdate', [ProveedorController::class, 'update']) -> name('proveedorUpdate');

//rutas servicios
Route::post('servicioGuardar', [ServicioController::class, 'guardar']) -> name('servicioGuardar'); 
Route::get('servicio', [ServicioController::class, 'index']) -> name('servicio'); 
Route::put('servicioUpdate', [ServicioController::class, 'update']) -> name('servicioUpdate');

//rutas usuario  
Route::post('usuarioGuardar', [UsuarioController::class, 'guardar']) -> name('usuarioGuardar'); 
Route::get('usuario', [UsuarioController::class, 'index']) -> name('usuario'); 
Route::put('usuarioUpdate', [UsuarioController::class, 'update']) -> name('usuarioUpdate');
Route::delete('usuarioDelete', [UsuarioController::class, 'delete']) -> name('usuarioDelete');
