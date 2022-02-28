<?php

use App\Http\Controllers\TareaController;
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

//Crea ruta para retornar un msg
Route::get('/hola-mundo',function(){
    return 'Hola Mundo';
});
// Crear una ruta para retornar una vista
Route::get('/hola-mundo',function(){
    return view('paginas/hola-mundo');
});

Route::get('/grabaciones',function(){
    return view('paginas.grabaciones');
});
/*
Al abrir llaves dentro de la ruta, le decimos que esperamos que 
un parametro cualquiera y que dicho parametro lo almacenemos en 
una variable, en este caso nombre, dicho parametro se tiene que 
utilizar en la funcion
*/
Route::get('/grabaciones/{nombre}',function($nombre){
    /*
    dd (die done), Es un metodo de Laravel que mata la ejecucion de 
    la aplicacion y arroja lo que le hayamos pasado de parametro a la funcion
    dd($nombre);
    */
    //Compact permite enviar variables a las vistas, las variables son envias 
    //como cadenas
    return view('paginas.grabaciones',compact('nombre'));
});

