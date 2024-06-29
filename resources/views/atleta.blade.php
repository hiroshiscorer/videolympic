@extends('app')
@section('title') {{' | '.$atleta->nombre}} @endsection
@section('content')
    <main id="atleta" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul id="single-game-title" class="single-game color-coded">
                        <li class="{{ $atleta->color }}">
                            <img src="/images/athletes/{{ $atleta->imagen ?? "default.png" }}" alt="{{ $atleta->nombre }}">
                            <h2>{{ $atleta->nombre }} <span>{{ $atleta->integrantes }}</span></h2>
                            <p class="no-lines points-right">{{ $total_score }}<span class="no-margin">pts</span></p>
                        </li>
                    </ul>

                    <hr>
                    @if(count($eventos))
                        <ul class="result-list color-coded">
                            @foreach($eventos as $evento)
                                <li class="{{ $evento->Juego->color }}">
                                    <img src="/images/events/{{ $evento->Juego->imagen }}" alt="">
                                    <p class="evento-nombre">{{ $evento->Juego->nombre }} {{ $evento->Juego->juego_id == $evento->Juego->id ? '*' : '' }}</p>
                                    {!! match ($evento->Juego->sorting) {
											"intAsc", "intDesc" => '<p class="evento-resultado">'.number_format($evento->resultado).'</p>',
											"signedIntAsc", "signedIntDesc" => '<p class="evento-resultado">'.(intval($evento->resultado) < 0 ? '' : '+').number_format($evento->resultado).'</p>',
											"floatAsc", "floatDesc" => '<p class="evento-resultado">'.number_format(floatval($evento->resultado), 2).'</p>',
											"timeAsc", "timeDesc" => '<p class="evento-resultado">'.sprintf("%02d:%02d", floor($evento->resultado/60), abs($evento->resultado%60)).'</p>',
											default => '<p class="evento-resultado">'.$evento->resultado.'</p>',
                                    } !!}

                                    <p class="evento-score"><strong>{{ $evento->score }}</strong><span>pts</span></p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="no-match">No trials present in the system for this athlete yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
