@extends('app')
@section('title')
    {{' | Home'}}
@endsection
@section('content')
    <main id="home" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p>Bienvenidos a la primera edición de <strong>VideOlympicGames</strong>. Este evento consiste en jugar cada uno de los títulos escogidos por los mismos participantes para encontrar a un ganador.</p>
                    <p>Cada juego tiene los detalles de cómo será jugado. Una vez que todos los jugadores hayan participado, se asignará una puntuación dependiendo del desempeño que hayan tenido.</p>
                    <ul class="padFixL">
                        <li>Primer lugar: <strong>500 puntos</strong></li>
                        <li>Segundo lugar: <strong>300 puntos</strong></li>
                        <li>Tercer lugar: <strong>200 puntos</strong></li>
                        <li>Cuarto y Quinto lugar: <strong>100 puntos</strong></li>
                    </ul>

                    <p>Cuando el participante juegue el título que escogió, recibirá doble puntuación.</p>

                    <ul class="padFixL">
                        <li>Primer lugar: <strong>1000 puntos</strong></li>
                        <li>Segundo lugar: <strong>600 puntos</strong></li>
                        <li>Tercer lugar: <strong>400 puntos</strong></li>
                        <li>Cuarto y Quinto lugar: <strong>200 puntos</strong></li>
                    </ul>

                    <hr>

                    <h2>Orden de Juegos</h2>
                    <ul class="padFixL">
                        <li>Golf</li>
                        <li>Suika</li>
                        <li>Dr Mario</li>
                        <li>Mario Kart</li>
                        <li>Bowling</li>
                    </ul>

                    <h2>Orden de Atletas</h2>
                    <ul class="padFixL">
                        <li>Jiggly</li>
                        <li>Armando</li>
                        <li>Jenny</li>
                        <li>Dorita</li>
                        <li>Scorer</li>
                    </ul>
                    <hr>
                    <h2>Tabla General</h2>
                    @if(count($standings))
                    <ul id="standings-table" class="color-coded mtop90">
                        @foreach($standings as $atleta)
                            <li class="{{ $atleta->color }}">
                                <img src="/images/{{ $atleta->imagen }}" alt="{{ $atleta->nombre }}">
                                <p class="atleta">{{ $atleta->nombre }}<img src="/images/{{ \App\Models\Juego::where('id', $atleta->juego_id)->first()->imagen ?? 'test.jpg'}}" alt=""></p>

                                <p><strong>{{ $atleta->score ?? '0' }}</strong> <span>PTS</span></p>
                            </li>
                        @endforeach
                    </ul>
                    @else
                        <p>No hay atletas registrados aún.</p>
                    @endif

                    <hr>

                    <h2 class="title">Opciones de Juegos</h2>
                    @if(count($juegos))
                    <ul class="home-option-info">
                        @foreach($juegos as $juego)
                            <li class="{{ $juego->color }}">
                                <div class="{{ $juego->selected ? 'selected' : 'unselected' }}">
                                    <h3>{{ $juego->nombre }}</h3>
                                    <img class="skewed" src="/images/{{ $juego->imagen }}" alt="{{ $juego->nombre }}">
                                </div>
                                <p>{!! str_replace('|', ' ', $juego->reglas) !!}</p>
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
