@extends('app')
@section('title') {{' | '.$atleta->nombre}} @endsection
@section('content')
    <main id="atleta" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul id="single-game-title" class="single-game color-coded">
                        <li class="{{ $atleta->color }}">
                            <img src="/images/{{$atleta->imagen}}" alt="{{ $atleta->nombre }}">
                            <h2>{{ $atleta->nombre }}</h2>
                            <p class="no-lines">{{ $total_score }}<span class="no-margin">pts</span></p>
                        </li>
                    </ul>

                    <hr>
                    @if(count($eventos))
                        <ul class="result-list color-coded">
                            @foreach($eventos as $evento)
                                <li class="{{ $evento->Juego->color }}">
                                    <img src="/images/{{ $evento->Juego->imagen }}" alt="">
                                    <p class="evento-nombre">{{ $evento->Juego->nombre }} {{ $evento->Juego->juego_id == $evento->Juego->id ? '*' : '' }}</p>
                                    <p class="evento-resultado">{{ $evento->resultado }}</p>
                                    <p class="evento-score"><strong>{{ $evento->score }}</strong><span>pts</span></p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="no-match">No hay partidas en el sistema para este juego aún.</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
