@extends('layouts.layoutAdmin')

@section('content')

    <div class="container p-4">
        <div class="card" >
            <div class="card-header">
                <h1>Entrar</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.auth') }}">
                    @csrf

                    @if ($errors->all())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="username">Usuário</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Digite seu usuário"
                            required>
                    </div>
                    <div class="form-group py-1">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Digite sua senha" required>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-outline-primary">ENTRAR</button>
                    <br>
                    <br>

                </form>
            </div>
        </div>
    </div>

@endsection
