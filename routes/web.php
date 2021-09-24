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
Route::get('/', function () {
    return view('auth.login');
});
Route::resource('empleado',ApiEmpleadoController::class);
Route::resource('libro',ApiLibrosController::class);
Route::resource('editorial',ApiEditorialesController::class);
Route::resource('autor',ApiAutoresController::class);
//Auth::routes();

//Route::get('/home',[ApiEmpleadoController::class,'index']) ->name('home');

//Route::group(['middleware'=>'auth'],function() 
//{
  // Route::get('/', [ApiEmpleadoController::class,'index'])->name('home');
//}); 


//vistas

  Route::view('dev', 'devoluciones')->middleware('biblio');
  Route::view('prestamo','prestamos')->middleware('biblio');
  Route::view('user','Usuarios.user_login')->middleware('admin');
  Route::view('login','login');
  Route::view('usuario','Usuarios.usuarios')->middleware('admin');
  Route::view('tipo','Usuarios.tipo_usuario')->middleware('admin');




//controladores
Route::apiResource('apiUser','ControllerUser_login');
Route::apiResource('apiPrestamo','ApiPrestamoController');
Route::apiResource('apiejem','ApiEjemplaresController');
Route::apiResource('apidevolucion','ApiDevolucionesController');
Route::apiResource('apiTipos','ApiTiposController');
Route::apiResource('ApiUsuario','ApiUsuarioController');
Route::apiResource('apiCarrera','ApiCarrera');


//validación
Route::post('entrada','AccesoController@validar');
Route::get('logout', 'AccesoController@salir');


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
