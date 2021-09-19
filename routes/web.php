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
Route::view('user','Usuarios.user_login');
Route::view('login','login');
Route::view('usuario','Usuarios.usuarios');


//controladores
Route::apiResource('apiUser','ControllerUser_login');
Route::apiResource('apiPrestamo','ApiPrestamoController');
Route::apiResource('apiejem','ApiEjemplaresController');
Route::apiResource('apidevolucion','ApiDevolucionesController');
Route::apiResource('apiTipos','ApiTiposController');
Route::apiResource('ApiUsuario','ApiUsuarioController');


//validación
Route::post('entrada','AccesoController@validar');
Route::get('logout', 'AccesoController@salir');