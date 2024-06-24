@extends('app')
@section('title')
    {{' | Admin'}}
@endsection
@section('content')
    <main id="admin" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">Nuevo Resultado</h2>
                    <p><a href="/admin">Volver a Admin</a></p>
                    @if(session('msg'))
                        <p class="message">{{ session('msg') }}</p>
                    @endif
                    <form action="/guardar-resultado" method="post">
                        @csrf
                        <label for="atleta">Atleta</label>
                        <select name="atleta" id="atleta" required>
                            <option value="">--- Seleccione un valor ---</option>
                            @foreach($atletas as $atleta)
                            <option value="{{ $atleta->id }}">{{ $atleta->nombre }}</option>
                            @endforeach
                        </select>
                        <label for="juego">Juego</label>
                        <select name="juego" id="juego" required>
                            <option value="">--- Seleccione un valor ---</option>
                            @foreach($juegos as $juego)
                            <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                            @endforeach
                        </select>

                        <label for="score">Score</label>
                        <input id="score" type="number" name="score" step="100" min="100" max="1000" value="100">

                        <label for="resultado">Resultado</label>
                        <input id="resultado" type="text" name="resultado" maxlength="255">
                        <hr>
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
