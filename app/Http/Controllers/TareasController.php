<?php

namespace App\Http\Controllers;

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
    ];

    public function index()
    {
        // $tareas = Tarea::all();
        // $tareas = Auth::user()->tarea()->where('column', 'val')->get();
        $tareas = Auth::user()->tarea;
        return view ('tareas.indexTareas', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas.formTareas');
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
        Tarea::create($request->all());

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
        return view('tareas.formEditTareas', compact('tarea'));
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

        Tarea::where('id', $tarea->id)->update($request->except('_method','_token'));

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
