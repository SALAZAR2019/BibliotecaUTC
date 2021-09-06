<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\EmpleadoController;
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
Route::resource('empleado',ApiEmpleadoController::class);
Route::get('/', function () {
    return view('welcome');
});

//vistas
Route::view('dev', 'devoluciones');
Route::view('prestamo','prestamos');

//controladores
Route::apiResource('apiPrestamo','ApiPrestamoController');
Route::apiResource('apiejem','ApiEjemplaresController');
Route::apiResource('apidevolucion','ApiDevolucionesController');