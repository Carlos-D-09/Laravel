<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TareasController extends Controller
{
    public function index(){
        $tareas = DB::table('tareas')->get();
        // dd($tareas);
        //la función compact permite pasar variables a la pagina hacia la cual estamos siendo reedirigidos
        return view('tareas.indexTareas',compact('tareas'));
    }

    public function create(){
        return view('tareas.formTareas');
    }
    public function store(){
        //validacion y limpieza
        //Guarda a DB
        //Redireccionar
    }
}
