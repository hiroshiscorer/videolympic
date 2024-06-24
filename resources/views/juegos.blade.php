@extends('app')
@section('title') {{' | Juegos'}} @endsection
@section('content')
    <main id="juegos" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">Juegos</h2>
                    @if(count($juegos))
                    <ul id="juegos-list" class="color-coded">
                    @foreach($juegos as $juego)
                        <li class="{{ $juego->color }}">
                            <img src="/images/{{$juego->imagen}}" alt="{{ $juego->nombre }}">
                            <p>{{ $juego->nombre }}</p>
                            <a href="/juego/{{ $juego->nombre }}">Ver detalle</a>
                        </li>
                    @endforeach
                    </ul>
                    @else
                    <p>No hay juegos registrados aún.</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
