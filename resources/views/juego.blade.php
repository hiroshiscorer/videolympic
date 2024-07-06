@extends('app')
@section('title') {{' | '.$juego->nombre}} @endsection
@section('content')
    <main id="juego" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul id="single-game-title" class="single-game color-coded">
                        <li class="{{ $juego->color }}">
                            <img src="/images/events/{{ $juego->imagen === '' ? 'default.png' : $juego->imagen }}" alt="{{ $juego->nombre }}">
                            <h2>{{ $juego->nombre }}</h2>
                        </li>
                    </ul>
                    <p class="short-description mtop60 mbot60">{{ $juego->descripcion }}</p>
                    <p class="start-date"><strong>Starts:</strong> {{ \Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $juego->created_at)->format('l j-M-Y') . ' (' . \Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $juego->created_at) ->diffForHumans().')'  }}</p>
                    <p class="end-date"><strong>Ends:</strong> {{ \Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $juego->ends_at)->format('l j-M-Y') . ' (' . \Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $juego->ends_at) ->diffForHumans().')' }}</p>
                    <h3 class="mtop60 mbot">Event Rules</h3>
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
                                    <img src="/images/athletes/{{ $evento->Atleta->imagen ?? 'default.png' }}" alt="">
                                    <p class="evento-nombre">{{ $evento->Atleta->nombre }} {{ $evento->Atleta->juego_id == $evento->Juego->id ? '*' : '' }}</p>
                                    {!! match ($juego->sorting) {
											"intAsc", "intDesc" => '<p class="evento-resultado">'.number_format($evento->resultado).'</p>',
											"signedIntAsc", "signedIntDesc" => '<p class="evento-resultado">'.(intval($evento->resultado) < 0 ? '' : '+').number_format($evento->resultado).'</p>',
											"floatAsc", "floatDesc" => '<p class="evento-resultado">'.number_format(floatval($evento->resultado), 2).'</p>',
											"timeAsc", "timeDesc" => '<p class="evento-resultado"><span class="dnf">'.($evento->dnf == 1 ? '(DNF)' : '').'</span>'.sprintf("%02d:%02d", floor($evento->resultado/60), abs($evento->resultado%60)).'</p>',
											default => '<p class="evento-resultado">'.$evento->resultado.'</p>',
                                    } !!}
                                    <p class="evento-score"><strong>{{ $evento->score }}</strong><span>pts</span></p>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="no-match">No trials present in the system for this event yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
