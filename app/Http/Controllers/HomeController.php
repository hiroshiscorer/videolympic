<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use App\Models\Juego;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $standings = DB::table('atletas')
            ->select(DB::raw('atletas.id, nombre, integrantes, SUM(score) score, imagen, color, atletas.juego_id'))
            ->leftJoin('eventos', 'atletas.id', '=', 'eventos.atleta_id')
            ->groupBy('atletas.id')
            ->orderByDesc('score')
            ->orderBy('nombre')
            ->get();
        $juegos = Juego::orderByDesc('selected')->get();
        return view('home', compact('standings', 'juegos'));
    }

    public function admin() {
        $atletas = Atleta::orderBy('nombre')->get();
        $juegos = Juego::orderBy('id')->get();
        return view('admin.index', compact('atletas', 'juegos'));
    }
}
