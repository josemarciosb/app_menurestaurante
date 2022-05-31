<!DOCTYPE html>
<html lang="pt-br">

<!-- Desenvolvido por Marcio Britto - josemarcio_sb@hotmail.com -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ url('css/header.css') }}">

    <!--
    <link rel="stylesheet" href="{{ url('css/footer.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    -->

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <!-- <script src="{{ url('js/script.js') }}"></script> -->

    <title>Restaurante - MENU DIGITAL</title>
</head>

<body>

    <div class="container p-4">
        <div class="card">
            <div class="card-header">
                <h1>Cadastre-se</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.save') }}">
                    @csrf

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
                            required>
                    </div>
                    <div class="form-group">
                        <label for="username">Nome de usuário</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Digite um nome de usuário"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Digite sua senha" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirme sua senha</label>
                        <input type="password" class="form-control" name="confirmPassword" id="password"
                            placeholder="Digite sua senha" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox" required>
                        <label class="form-check-label" for="exampleCheck1">Aceito os termos de uso</label>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">CADASTRAR</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
