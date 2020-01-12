@extends('layouts.default')

@section('title', 'Cadastrar')

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                Cadastrar
            </div>

            <form action="{{route('cadastros.clientes.salvar')}}" class="formulario" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="input">
                    <label for="foto">Foto</label>
                    <div class="image">
                        <img src="{{asset('images/no-image.png')}}">
                        <input type="file" class="input" name="foto">
                    </div>
                    @if($errors->has('foto'))
                        @foreach($errors->get('foto') as $erro)
                            <span class="input-error">{{$erro}}</span><br>
                        @endforeach
                    @endif
                </div>

                <div class="input">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" placeholder="Nome">
                    @if($errors->has('nome'))
                        @foreach($errors->get('nome') as $erro)
                            <span class="input-error">{{$erro}}</span><br>
                        @endforeach
                    @endif
                </div>

                <div class="input">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email">
                    @if($errors->has('email'))
                        @foreach($errors->get('email') as $erro)
                            <span class="input-error">{{$erro}}</span><br>
                        @endforeach
                    @endif
                </div>

                <div class="input">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="input-ddd" name="ddd" placeholder="DDD">
                    <input type="text" class="input-telefone" name="telefone" placeholder="Telefone">
                    @if($errors->has('telefone'))
                        @foreach($errors->get('telefone') as $erro)
                            <span class="input-error">{{$erro}}</span><br>
                        @endforeach
                    @endif
                    @if($errors->has('dd'))
                        @foreach($errors->get('ddd') as $erro)
                            <span class="input-error">{{$erro}}</span><br>
                        @endforeach
                    @endif
                </div>

                <button type="button" onclick="window.location.href='{{route('cadastros.clientes.listar')}}'">Voltar</button>

                <button type="submit">Salvar</button>

            </form>

        </div>
    </div>
@endsection
