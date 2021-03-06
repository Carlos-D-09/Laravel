<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Models\Tarea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TareasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth')->except('index', 'show');
        // $this->middleware('auth')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $reglasValidacion = [
        'tarea' => 'required|min:5|max:255',
        'descripcion' => 'required|min:5|max:255',
        'tipo' => ['required'],
        'etiqueta_id' => 'required',
    ];

    public function index()
    {
        // $tareas = Tarea::all();
        // $tareas = Auth::user()->tarea()->where('column', 'val')->get();
        $tareas = Tarea::with('user:id,name,email')->with('etiquetas')->get();
        //$tarea = Tarea::with('user', 'etiquetas')->get();
        return view ('tareas.indexTareas', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etiquetas = Etiqueta::all();
        return view('tareas.formTareas', compact('etiquetas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->reglasValidacion);
        // Metodo manual
        // $tarea = new Tarea();
        // $tarea->user_id = Auth::id();
        // $tarea->tarea = $request->tarea;
        // $tarea->descripcion = $request->descripcion;
        // $tarea->tipo = $request->tipo;
        // $tarea->save();

        //Metodo save de Eloquent
        // $tarea = new Tarea();
        // $tarea->tarea = $request->tarea;
        // $tarea->descripcion = $request->descripcion;
        // $tarea->tipo = $request->tipo;

        // $user = Auth::user();
        // $user->tarea()->save($tarea);

        $request->merge([
            'user_id' => Auth::id(),
        ]);
        $tarea = Tarea::create($request->all());
        $tarea->etiquetas()->attach($request->etiqueta_id);
        return redirect('/tarea');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.showTarea', compact('tarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        $etiquetas = Etiqueta::all();
        return view('tareas.formEditTareas', compact('tarea', 'etiquetas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        $request->validate($this->reglasValidacion);
        // Metodo manual
        // $tarea->tarea = $request->tarea;
        // $tarea->descripcion = $request->descripcion;
        // $tarea->tipo = $request->tipo;
        // $tarea->save();

        Tarea::where('id', $tarea->id)->update($request->except('_method','_token','etiqueta_id'));
        //El m??todo sync compara los elementos que se estan recibiendo con los que se tenian y se eliman los que no concuerden entre el nuevo y el viejo
        $tarea->etiquetas()->sync($request->etiqueta_id);
        return redirect('/tarea');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect('/tarea');
    }
}
