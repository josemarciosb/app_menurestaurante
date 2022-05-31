@extends('layouts.layoutAdmin')

@section('content')

<div class="container p-4">
    <div class="card">
        <div class="card-header">
            <h1>Editar Usuário</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('user.update' )}}">
                @csrf
                @method('put')

                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                @if ($errors->all())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            <strong> {{ $error }} </strong>
                        </div>
                    @endforeach
                @endif

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="name" id="nome" placeholder="Digite seu nome"
                       value="{{ $user->name }}" required>
                </div>
                <div class="form-group mt-2">
                    <label for="username">Usuário</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Digite um nome de usuário"
                    value="{{ $user->username }}" required>
                </div>
                <div class="form-group mt-2">
                    <label for="password">Senha</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="Digite sua senha" >
                </div>
                <div class="form-group mt-2">
                    <label for="password">Confirme sua senha</label>
                    <input type="password" class="form-control" name="confirmPassword" id="password"
                        placeholder="Digite sua senha" >
                </div>

                <button type="submit" class="btn btn-outline-primary mt-3">ATUALIZAR</button>
            </form>
        </div>
    </div>
</div>


@endsection
