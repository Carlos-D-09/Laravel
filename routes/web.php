<?php

use App\Http\Controllers\TareasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

//Crea ruta para retornar un msg
Route::get('/hola-mundo',function(){
    return 'Hola Mundo';
});
// Crear una ruta para retornar una vista
Route::get('/hola-mundo',function(){
    return view('paginas/hola-mundo');
});

//Rutas para la manipulacion de tareas
Route::get('/tareas', [TareasController::class, 'index']);
Route::get('tarea/create', [TareasController::class, 'create']);
Route::post('tarea/store', [TareasController::class, 'store']);

Route::get('/grabaciones/{nombre}/{year?}/{cantidad?}',function($nombre, $year = null, $cantidad = null){
    return view('paginas.grabaciones', compact('nombre', 'year', 'cantidad'));
});
