@inject('totalCart', 'App\Http\Controllers\CartController')

<div class="container">
    <nav class="navbar fixed-bottom bg-primary">

        @if (session()->exists('cart') and session('cart') != null)
            <a class="btn btn-outline-light border-0" href="{{ route('cart.show') }}">
                <h4 class=""><i class="bi bi-cart4" ></i> Carrinho - Valor total: R${{ $totalCart::totalCart() }}</h4>
            </a>
        @else
            <a class="btn btn-outline-light border-0" href="{{ route('cart.show') }}">
                <h3><i class="bi bi-cart4"></i> Carrinho - Vazio</h3>
            </a>
        @endif

    </nav>
</div>
