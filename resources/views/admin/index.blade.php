@extends('app')
@section('title')
    {{' | Admin'}}
@endsection
@section('content')
    <main id="admin" class="base">
        <div class="container">
            <div class="row">
                <div class="col-12">
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
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
