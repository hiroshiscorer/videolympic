@extends('app')
@section('title') {{' | Participantes'}} @endsection
@section('content')
    <main id="participants" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">Atletas</h2>
                    @if(count($atletas))
                    <ul id="participants-list" class="color-coded">
                    @foreach($atletas as $atleta)
                        <li class="{{ $atleta->color }}">
                            <img src="/images/{{$atleta->imagen}}" alt="{{ $atleta->nombre }}">
                            <p>{{ $atleta->nombre }}</p>
                            <span>{{ $atleta->Juego->nombre ?? 'Sin juego elegido' }}</span>
                            <a href="/atleta/{{ $atleta->nombre }}">Ver detalle</a>
                        </li>
                    @endforeach
                    </ul>
                    @else
                        <p>No hay atletas registrados aún.</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
