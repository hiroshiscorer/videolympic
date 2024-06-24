@extends('app')
@section('title') {{' | '.$juego->nombre}} @endsection
@section('content')
    <main id="juego" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul id="single-game-title" class="single-game color-coded">
                        <li class="{{ $juego->color }}">
                            <img src="/images/{{$juego->imagen}}" alt="{{ $juego->nombre }}">
                            <h2>{{ $juego->nombre }}</h2>
                        </li>
                    </ul>
                    <p class="short-description mtop60 mbot60">{{ $juego->descripcion }}</p>
                    <ul class="rule-list padFixL">
                        @foreach($reglas as $regla)
                            <li>{!! $regla !!}</li>
                        @endforeach
                    </ul>
                    <hr>
                    @if(count($eventos))
                        <ul class="result-list color-coded">
                            @foreach($eventos as $evento)
                                <li class="{{ $evento->Atleta->color }}">
                                    <img src="/images/{{ $evento->Atleta->imagen }}" alt="">
                                    <p class="evento-nombre">{{ $evento->Atleta->nombre }} {{ $evento->Atleta->juego_id == $evento->Juego->id ? '*' : '' }}</p>
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
