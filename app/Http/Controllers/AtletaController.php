<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use App\Models\Evento;
use App\Models\Juego;
use Illuminate\Http\Request;

class AtletaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atletas = Atleta::orderBy('nombre')->get();
        return view('atletas', compact('atletas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.nuevo-atleta');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $atleta = new Atleta;
        $atleta->nombre = $request->nombre;
        $atleta->integrantes = $request->integrantes;
        $atleta->imagen = $request->imagen;
        $atleta->color = $request->color;
        $atleta->save();

        return redirect()
            ->route('nuevo-atleta')
            ->with(['msg' => 'Éxito']);
    }

    /**
     * Display the specified resource.
     */
    public function show($atleta)
    {
        $atleta = Atleta::where('nombre', $atleta)->first();
        $total_score = Evento::where('atleta_id', $atleta->id)->sum('score');
        $eventos = Evento::where('atleta_id', $atleta->id)
            ->orderByDesc('score')
            ->get();
        return view('atleta', compact('atleta','eventos', 'total_score'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($atleta)
    {
        $atleta = Atleta::where('nombre', $atleta)->first();
        return view('admin.editar-atletas', compact('atleta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atleta $atleta)
    {
        $atleta = Atleta::where('id', $request->id)->first();
        $atleta->nombre = $request->nombre;
        $atleta->integrantes = $request->integrantes;
        $atleta->imagen = $request->imagen;
        $atleta->color = $request->color;
        $atleta->save();

        return redirect()
            ->route('admin')
            ->with(['msg' => 'Éxito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $atleta = Atleta::find($request->id);
        $atleta->delete();
        return redirect()
            ->route('admin')
            ->with(['msg' => 'Éxito']);
    }
}
