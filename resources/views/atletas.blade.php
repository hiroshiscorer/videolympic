@extends('app')
@section('title') {{' | Participantes'}} @endsection
@section('content')
    <main id="participants" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">Athletes</h2>
                    @if(count($atletas))
                    <ul id="participants-list" class="color-coded">
                    @foreach($atletas as $atleta)
                        <li class="{{ $atleta->color }}">
                            <img src="/images/athletes/{{$atleta->imagen ?? "default.png"}}" alt="{{ $atleta->nombre }}">
                            <p>{{ $atleta->nombre }} <span>{{ $atleta->integrantes }}</span></p>

                            <a href="/athlete/{{ $atleta->nombre }}">See detail</a>
                        </li>
                    @endforeach
                    </ul>
                    @else
                        <p>No registered athletes yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
