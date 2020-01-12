@extends('layouts.default')

@section('title', 'Cadastros')

@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                Cadastros
            </div>

            <div class="links">
                <a href="{{route('cadastros.clientes.listar')}}">Clientes</a>
                <a href="{{route('cadastros.clientes.cadastrar')}}">Cadastrar Cliente</a>
            </div>
        </div>
    </div>
@endsection


