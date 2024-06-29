@extends('app')
@section('title')
    {{' | Admin'}}
@endsection
@section('content')
    <main id="admin" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(session('msg'))
                        <p class="message">{{ session('msg') }}</p>
                    @endif
                    <ul id="admin-nav">
                        <li>
                            <a href="nuevo-resultado">
                                <i class="fa fa-check-circle"></i>
                                Registrar resultado
                            </a>
                        </li>
                        <li>
                            <a href="editar-resultado">
                                <i class="fa fa-edit"></i>
                                Editar resultado
                            </a>
                        </li>
                        <li style="width: 100%; height: 0;"></li>
                        <li>
                            <a href="nuevo-atleta">
                                <i class="fa fa-plus"></i>
                                Nuevo Atleta
                            </a>
                        </li>
                        <li>
                            <a href="nuevo-juego">
                                <i class="fa fa-pencil"></i>
                                Nuevo Juego
                            </a>
                        </li>
                    </ul>
                    <hr class="mtop90">
                    <div class="row">
                        <div class="col-6">
                            <h3>Editar Atletas</h3>
                            <ul id="admin-atleta-list" class="admin-home-list">
                                @foreach($atletas as $atleta)
                                    <li>
                                        <a href="/editar-atleta/{{ $atleta->nombre }}">{{ $atleta->nombre }}</a>
                                        <form action="eliminar-atleta" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $atleta->id }}">
                                            <button class="delete" type="submit" onclick="return confirm('Eliminar {!! $atleta->nombre !!}?')">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-6">
                            <h3>Editar Eventos</h3>
                            <ul id="admin-juego-list" class="admin-home-list">
                                @foreach($juegos as $juego)
                                    <li>
                                        <a href="/editar-juego/{{ $juego->id }}">{{ $juego->nombre }}</a>
                                        <form action="eliminar-juego" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $juego->id }}">
                                            <button class="delete" type="submit" onclick="return confirm('Eliminar {!! $juego->nombre !!}?')">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
