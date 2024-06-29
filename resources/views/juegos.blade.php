@extends('app')
@section('title') {{' | Juegos'}} @endsection
@section('content')
    <main id="juegos" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">Events</h2>
                    @if(count($juegos))
                    <ul id="juegos-list" class="color-coded">
                    @foreach($juegos as $juego)
                        <li class="{{ $juego->color }}">
                            <img src="/images/events/{{$juego->imagen ?? 'default.png'}}" alt="{{ $juego->nombre }}">
                            <p>{{ $juego->nombre }}</p>
                            <a href="/event/{{ $juego->nombre }}">See detail</a>
                        </li>
                    @endforeach
                    </ul>
                    @else
                    <p>No registered events yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
