@inject('user', 'App\Http\Controllers\UserController')


<header>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">

        <a class="navbar-brand" href="{{ route('home') }}">LOGO</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('home') }}">
                        <i class="material-icons" style="font-size: 15px">home</i> PÁGINA INICIAL</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('menu') }}">
                        <i class="material-icons" style="font-size: 15px;">restaurant_menu</i> MENU</a>
                </li>
            </ul>

            <ul class="navbar-nav">

                @if ($user::userType() == 'owner')

                    <li class="nav-item py-1">
                        <label class="nav-link text-light d-inline py-1">Estamos</label>
                        <input type="checkbox" class="nav-link d-inline" data-toggle="toggle" data-height="5"
                            data-size="sm" data-on="ABERTOS" data-off="FECHADOS" name="isOpen"
                            onchange="location.href='{{ route('user.open') }}'" @if ($user::openAtMoment() == 'sim') {{ 'checked' }} @endif>
                    </li>


                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" data-bs-toggle="dropdown">
                                PRODUTOS
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('marmitex.register') }}">Cadastrar
                                    Marmitex</a>
                                <a class="dropdown-item" href="{{ route('marmitex.edit') }}">Editar Marmitex</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('dish.register') }}">Cadastrar Prato</a>
                                <a class="dropdown-item" href="{{ route('dish.remove') }}">Excluir Prato</a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('drink.register') }}">Cadastrar Bebida</a>
                                <a class="dropdown-item" href="{{ route('drink.remove') }}">Excluir Bebida</a>
                            </div>
                        </div>
                    </li>
                @endif


                @if (Auth::check())
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" data-bs-toggle="dropdown">
                                CONTA
                            </a>
                            <div class="dropdown-menu">

                                <a class="dropdown-item" href="{{ route('user.edit') }}">Editar Conta</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('user.logout') }}">Sair</a>
                            </div>
                        </div>
                    </li>
                @endif

                <a class="btn btn-outline-primary me-2" href="{{ route('cart.show') }}"><i class="bi bi-cart"></i>
                     CARRINHO</a>

            </ul>
        </div>
    </nav>
</header>
