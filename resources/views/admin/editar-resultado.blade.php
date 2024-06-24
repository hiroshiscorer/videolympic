@extends('app')
@section('title')
    {{' | Admin'}}
@endsection
@section('content')
    <main id="admin" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">Editar Resultado</h2>
                    <p><a href="/admin">Volver a Admin</a></p>
                    @if(session('msg'))
                        <p class="message">{{ session('msg') }}</p>
                    @endif

                    <ul id="editar-resultados-list">
                    @foreach($eventos as $evento)
                        <li>
                            <div class="{{ $evento->Atleta->color }}">
                                {{ $evento->Atleta->nombre }}
                            </div>
                            <div class="{{ $evento->Juego->color }}">
                                {{ $evento->Juego->nombre }}
                            </div>
                            <div>
                                <form action="/update-resultado" method="post">
                                    @csrf
                                    <input type="hidden" name="type" value="score">
                                    <input type="hidden" name="id" value="{{ $evento->id }}">
                                    <label for="score">Score</label>
                                    <input id="score" type="number" name="score" step="100" min="100" max="1000" value="{{ $evento->score }}">
                                    <button type="submit">Update</button>
                                </form>
                            </div>
                            <div>
                                <form action="/update-resultado" method="post">
                                    @csrf
                                    <input type="hidden" name="type" value="resultado">
                                    <input type="hidden" name="id" value="{{ $evento->id }}">
                                    <label for="resultado">Resultado</label>
                                    <input id="resultado" type="text" name="resultado" maxlength="255" value="{{ $evento->resultado }}">
                                    <button type="submit">Update</button>
                                </form>
                            </div>
                            <div>
                                <form action="/eliminar-resultado" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $evento->id }}">
                                    <button class="delete" type="submit" onclick="return confirm('Eliminar {!! $evento->resultado !!}?')"><i class="fa fa-times"></i></button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </main>
@endsection
