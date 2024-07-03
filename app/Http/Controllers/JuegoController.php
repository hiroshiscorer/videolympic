<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Juego;
use Carbon\Carbon;
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
        $juegos = Juego::where('selected', 1)->orderBy('id')->get();
        return view('juegos', compact('juegos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.nuevo-juego');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $juego = new Juego;
        $juego->nombre = $request->nombre;
        $juego->imagen = $request->imagen;
        $juego->reglas = $request->reglas;
        $juego->descripcion = $request->descripcion;
        $juego->color = $request->color;
        $juego->sorting = $request->sorting;
        $juego->save();

        return redirect()
            ->route('nuevo-juego')
            ->with(['msg' => 'Éxito']);
    }

    /**
     * Display the specified resource.
     */
    public function show($juego)
    {
        $juego = Juego::where('nombre', $juego)->first();
        switch ($juego->sorting) {
            case "intAsc":
                $eventos = Evento::where('juego_id', $juego->id)
                    ->orderByDesc('score')
                    ->orderBy('resultado')
                    ->get();
                break;
            case "signedIntAsc":
                $eventos = Evento::where('juego_id', $juego->id)
                    ->orderByDesc('score')
                    ->orderByRaw('CAST(resultado as SIGNED)')
                    ->get();
                break;
            case "floatAsc":
                $eventos = Evento::where('juego_id', $juego->id)
                    ->orderByDesc('score')
                    ->orderByRaw('CAST(resultado as DECIMAL(10, 2))')
                    ->get();
                break;
            case "timeAsc":
                $eventos = Evento::where('juego_id', $juego->id)
                    ->orderByRaw('score DESC, CONVERT(resultado, SIGNED) ASC')
                    ->get();
                break;
            case "signedIntDesc":
                $eventos = Evento::where('juego_id', $juego->id)
                    ->orderByDesc('score')
                    ->orderByRaw('CAST(resultado as SIGNED) DESC')
                    ->get();
                break;
            case "floatDesc":
                $eventos = Evento::where('juego_id', $juego->id)
                    ->orderByDesc('score')
                    ->orderByRaw('CAST(resultado as DECIMAL(10, 2)) DESC')
                    ->get();
                break;
            case "timeDesc":
                $eventos = Evento::where('juego_id', $juego->id)
                    ->orderByRaw('score DESC, CONVERT(resultado, SIGNED) DESC')
                    ->get();
                break;
            case "intDesc":
                $eventos = Evento::where('juego_id', $juego->id)
                    ->orderByDesc('score')
                    ->orderByRaw('CAST(resultado as UNSIGNED) DESC')
                    ->get();
                break;
            default:
                $eventos = Evento::where('juego_id', $juego->id)
                    ->orderByDesc('score')
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
        return view('admin.editar-juego', compact('juego'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Juego $juego)
    {
        $juego = Juego::find($request->id);
        $juego->nombre = $request->nombre;
        $juego->imagen = $request->imagen;
        $juego->reglas = $request->reglas;
        $juego->descripcion = $request->descripcion;
        $juego->color = $request->color;
        $juego->sorting = $request->sorting;
        $juego->save();

        return redirect()
            ->route('admin')
            ->with(['msg' => 'Éxito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Juego $juego)
    {
        $juego = Juego::find($request->id);
        $juego->delete();
        return redirect()
            ->route('admin')
            ->with(['msg' => 'Éxito']);
    }
}
