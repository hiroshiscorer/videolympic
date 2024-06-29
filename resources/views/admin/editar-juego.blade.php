@extends('app')
@section('title')
    {{' | Admin'}}
@endsection
@section('content')
    <main id="admin" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">Editar Juego</h2>
                    <p><a href="/admin">Volver a Admin</a></p>
                    @if(session('msg'))
                        <p class="message">{{ session('msg') }}</p>
                    @endif
                    <form action="/update-juego" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $juego->id }}">
                        <label for="juego">Juego</label>
                        <input id="juego" type="text" name="nombre" maxlength="64" value="{{ $juego->nombre }}" required>

                        <label for="imagen">Imagen</label>
                        <input name="imagen" type="text" id="imagen" value="{{ $juego->imagen }}" maxlength="64">

                        <label for="reglas">Reglas (Separadas por | )</label>
                        <textarea class="w100" id="reglas" name="reglas">{{ $juego->reglas }}</textarea>

                        <label for="descripcion">Descripción</label>
                        <textarea class="w100" id="descripcion" name="descripcion">{{ $juego->descripcion }}</textarea>

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


                        <label for="sorting">Sorting</label>
                        <select id="sorting" name="sorting" required>
                            <option value="">--- Selecciona Orden ---</option>
                            @foreach(\App\Models\Juego::getTypeList() as $mode)
                            <option value="{{ $mode }}">{{ $mode }}</option>
                            @endforeach
                        </select>

                        <script>
                            $('#color').val('{{ $juego->color }}');
                            $('#sorting').val('{{ $juego->sorting }}');
                        </script>

                        <hr>
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
