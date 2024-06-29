<?php

namespace App\Http\Controllers;

use App\Models\Atleta;
use App\Models\Evento;
use App\Models\Juego;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $atletas = Atleta::all();
        $juegos = Juego::where('selected', '1')->get();
        return view('admin.nuevo-resultado', compact('atletas', 'juegos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $evento = new Evento;
        $evento->atleta_id = $request->atleta;
        $evento->juego_id = $request->juego;
        $evento->score = $request->score;
        if (Juego::isTimeType($request->juego)) {
            list($min, $sec) = explode(':', $request->resultado);
            $finalTime = (intval($min) * 60) + intval($sec);

            $evento->resultado = $finalTime;
        } else {
            $evento->resultado = $request->resultado;
        }
        $evento->save();

        return redirect()
            ->route('nuevo-resultado')
            ->with(['msg' => 'Éxito']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $eventos = Evento::orderBy('atleta_id')->get();
        return view('admin.editar-resultado', compact('eventos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $evento = Evento::find($request->id);
        switch ($request->type) {
            case 'score':
                $evento->score = $request->score;
                break;
            case 'resultado':
                if (Juego::isTimeType($request->juego_id)) {
                    list($min, $sec) = explode(':', $request->resultado);
                    $finalTime = (intval($min) * 60) + intval($sec);

                    $evento->resultado = $finalTime;
                } else {
                    $evento->resultado = $request->resultado;
                }
                break;
        }
        $evento->save();

        return redirect()
            ->route('/editar-resultado')
            ->with(['msg' => 'Éxito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $evento = Evento::find($request->id);
        $evento->delete();
        return redirect()
            ->route('/editar-resultado')
            ->with(['msg' => 'Éxito']);

    }
}
