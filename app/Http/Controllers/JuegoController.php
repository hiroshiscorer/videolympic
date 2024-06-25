<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Juego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $juegos = Juego::where('selected', 1)->orderBy('nombre')->get();
        return view('juegos', compact('juegos'));
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
    public function show($juego)
    {
        $juego = Juego::where('nombre', $juego)->first();
        switch ($juego->sorting) {
            case "intAsc":
            case "signedIntAsc":
            case "floatAsc":
            case "timeAsc":
                $eventos = Evento::where('juego_id', $juego->id)
                    ->orderByDesc('score')
                    ->orderBy('resultado')
                    ->get();
                break;
            case "signedIntDesc":
            case "floatDesc":
            case "timeDesc":
            case "intDesc":
            default:
                $eventos = Evento::where('juego_id', $juego->id)
                    ->orderByDesc('score')
                    ->orderByDesc('resultado')
                    ->get();
            break;
        }

        $reglas = explode('|', $juego->reglas);
        return view('juego', compact('juego', 'reglas', 'eventos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Juego $juego)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Juego $juego)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Juego $juego)
    {
        //
    }
}
