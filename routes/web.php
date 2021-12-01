<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ApiEmpleadoController;
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
Route::resource('libro',ApiLibrosController::class)->middleware('sesion');
Route::resource('editorial',ApiEditorialesController::class)->middleware('sesion');
Route::resource('autor',ApiAutoresController::class)->middleware('sesion');
Route::resource('carrera',ApiCarrerasController::class)->middleware('sesion');
Route::resource('materia',ApiMateriasController::class)->middleware('sesion');
//Auth::routes();

//Route::get('/home',[ApiEmpleadoController::class,'index']) ->name('home');

//Route::group(['middleware'=>'auth'],function() 
//{
  // Route::get('/', [ApiEmpleadoController::class,'index'])->name('home');
//}); 


//vistas

  Route::view('dev', 'devoluciones')->middleware('sesion');
  Route::view('prestamo','prestamos')->middleware('sesion');
  Route::view('user','Usuarios.user_login')->middleware('sesion');
  Route::view('/','login');
  Route::view('usuario','Usuarios.usuarios')->middleware('sesion');
  Route::view('tipo','Usuarios.tipo_usuario')->middleware('sesion');



//vistas
// Route::view('dev', 'devoluciones');
// Route::view('prestamo','prestamos');
// Route::view('user','Usuarios.user_login');
// Route::view('login','login');
// Route::view('usuario','Usuarios.usuarios');
// Route::view('tipo','Usuarios.tipo_usuario');
Route::view('ejemplar','ejemplares')->middleware('sesion');


//controladores
Route::apiResource('apiUser','ControllerUser_login');
Route::apiResource('apiPrestamo','ApiPrestamoController');
Route::apiResource('apiejem','ApiEjemplaresController');
Route::apiResource('apidevolucion','ApiDevolucionesController');
Route::apiResource('apiTipos','ApiTiposController');
Route::apiResource('ApiUsuario','ApiUsuarioController');
Route::apiResource('apiCarrera','ApiCarrera');

Route::apiResource('envio','autosendmail');


//validación
Route::post('entrada','AccesoController@validar');
Route::get('logout', 'AccesoController@salir');

Route::post('envios','autosend@send');


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
