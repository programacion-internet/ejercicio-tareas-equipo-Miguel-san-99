<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\User;
use App\Models\Archivo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTareaRequest;
use App\Http\Requests\UpdateTareaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificacionMailable;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $tareas = Tarea::where('user_id', $user->id)->get()
        ->merge($user->tareas)
        ->unique('id');
        return view('tareas.index-tareas', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tareas.registrar-tareas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'descripcion' => 'required|min:10|max:255',
            'fecha_limite' => 'required'
        ]);

        $tarea = new Tarea();
        $tarea->nombre = $request->nombre;
        $tarea->descripcion = $request->descripcion;
        $tarea->fecha_limite = $request->fecha_limite;
        $tarea->user_id = auth()->id();
        $tarea->save();
        return redirect()->route('tarea.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarea $tarea)
    {
        Gate::authorize('view', $tarea);
        $users = User::all();
        $user = auth()->user();
        $archivos = $tarea->archivos;
        return view('tareas.show-tareas', compact('tarea', 'users', 'archivos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarea $tarea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTareaRequest $request, Tarea $tarea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect()->route('tarea.index');
    }
    public function actualizarTareaUsuarios(Request $request, Tarea $tarea)
    {
        $tarea->users()->sync($request->user_id);
        $usuariosAsignados = $tarea->users;

        // Envía notificación por correo a cada uno
        foreach ($usuariosAsignados as $user) {
            Mail::to($user->email)->send(new notificacionMailable($user, $tarea));
        }
        return redirect()->route('tarea.show', $tarea);
    }
}
