@extends('layouts.default')

@section('title', 'Listar')

@section('content')
    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                Clientes
            </div>

            <div class="links margin-bot-ajust">
                <a href="{{route('cadastros.clientes.cadastrar')}}">
                    <i class="fa fa-user-plus" style="margin: 0 0.5em 1em 0;"></i>
                    Cadastrar Cliente
                </a>
            </div>

            @if(count($clientes) > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clientes as $cliente)
                            <tr>
                                <td>
                                    @if(!$cliente->url_foto)
                                        <img src="{{asset('images/no-image.png')}}" width="50px">
                                    @else
                                        <img src="{{ $cliente->url_foto_public }}" width="50px">
                                    @endif
                                </td>
                                <td>{{$cliente->nome}}</td>
                                <td>{{$cliente->email}}</td>
                                <td>{{$cliente->ddd}} {{$cliente->telefone}}</td>
                                <td>
                                    <a class="button-icons btn-edit" href="{{route('cadastros.clientes.editar', ['id' => $cliente->id])}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="button-icons btn-remove" onclick="remover('{{route('cadastros.clientes.remover', ['id' => $cliente->id])}}', '{{$cliente->nome}}')">
                                        <i class="fa fa-remove"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <span>
                    Não há clientes cadastrados.
                </span>
            @endif

            <div>
                <button type="button" class="button-bot" onclick="window.location.href='{{route('index')}}'">Voltar</button>
            </div>
        </div>
    </div>

    <script>
        function remover(link, nome)
        {
            if (confirm("Você deseja remover o cliente: " + nome +"?"))
            {
                window.location.href = link;
            }
        }
    </script>
@endsection
