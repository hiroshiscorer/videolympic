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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Atleta $atleta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Atleta $atleta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atleta $atleta)
    {
        //
    }
}
