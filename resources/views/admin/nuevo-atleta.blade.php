@extends('app')
@section('title')
    {{' | Admin'}}
@endsection
@section('content')
    <main id="admin" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">Nuevo Atleta</h2>
                    <p><a href="/admin">Volver a Admin</a></p>
                    @if(session('msg'))
                        <p class="message">{{ session('msg') }}</p>
                    @endif
                    <form action="/guardar-atleta" method="post">
                        @csrf
                        <label for="atleta">Atleta</label>
                        <input id="atleta" type="text" name="nombre" maxlength="120" required>

                        <label for="integrantes">Integrantes</label>
                        <input id="integrantes" type="text" name="integrantes" maxlength="64">

                        <label for="imagen">Imagen</label>
                        <input name="imagen" type="text" id="imagen" maxlength="64">

                        <label for="color">Color</label>
                        <select id="color" name="color" required>
                            <option value="">--- Selecciona Color ---</option>
                            <option value="red">Red</option>
                            <option value="orange">Orange</option>
                            <option value="yellow">Yellow</option>
                            <option value="green">Green</option>
                            <option value="cyan">Cyan</option>
                            <option value="blue">Blue</option>
                            <option value="purple">Purple</option>
                            <option value="magenta">Magenta</option>
                            <option value="grey">Grey</option>
                        </select>

                        <hr>
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
