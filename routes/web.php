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

//Auth::routes();

//Route::get('/home',[ApiEmpleadoController::class,'index']) ->name('home');

//Route::group(['middleware'=>'auth'],function() 
//{
  // Route::get('/', [ApiEmpleadoController::class,'index'])->name('home');
//}); 






//vistas
Route::view('dev', 'devoluciones');
Route::view('prestamo','prestamos');

//controladores
Route::apiResource('apiPrestamo','ApiPrestamoController');
Route::apiResource('apiejem','ApiEjemplaresController');
Route::apiResource('apidevolucion','ApiDevolucionesController');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
