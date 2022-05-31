@inject('totalCart', 'App\Http\Controllers\CartController')

@extends('layouts.layout')

@section('content')

    <div class="container-fluid p-4">

        @if (session()->exists('cart') and session('cart') != null)

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <table class="table table-striped table-responsive-sm">
                <thead class="thead-dark">
                    <tr>
                        <h2>Carrinho</h2>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $marmitex = '';
                        $bebidas = '';
                    @endphp

                    @foreach (json_decode($cart) as $product)
                        <tr>
                            <form action="{{ route('cart.remove') }}" method="POST" id="removeProduct">
                                @csrf

                                @if ($product->produto === 'marmitex')

                                    @php
                                        $food = '';
                                    @endphp

                                    @foreach ($product->comida as $comida)
                                        @php
                                            $food = $food . $comida . ', ';
                                        @endphp
                                    @endforeach
                                    @php
                                        $food = substr($food, 0, -2);
                                    @endphp

                                    <td>{{ $product->produto }}</td>
                                    <td>{{ $food }}</td>
                                    <td>1</td>
                                    <td>R${{ number_format($product->valor, 2, ',', '.') }}</td>

                                    @php
                                        $marmitex = $marmitex . ' 1 ' . $product->produto . ' ' . $product->tamanho . ' com ' . $food . ' %0D ';
                                    @endphp

                                @endif

                                @if ($product->produto === 'refrigerante' or $product->produto === 'suco')

                                    <td>{{ $product->nome }} {{ $product->tamanho }}</td>
                                    <td></td>
                                    <td>{{ $product->quantidade }}</td>
                                    <td>R${{ number_format($product->valor, 2, ',', '.') }}</td>

                                    @php
                                        $bebidas = $bebidas . $product->quantidade . ' ' . $product->nome . ' ' . $product->tamanho . ' %0D ';
                                    @endphp

                                @endif

                                <input hidden name="prod_id" value="{{ $product->prod_id }}">

                                <td> <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i> TIRAR DO
                                        CARRINHO</button> <br></td>

                            </form>
                        </tr>


                    @endforeach
                    <tr class="bg-light">

                        <td><strong>Valor Total</strong></td>
                        <td></td>
                        <td></td>
                        <td><strong>R${{ $totalCart::totalCart() }}</strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <div class="row ">

                <div class="col-lg-3 col-sm-4 col-4">

                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf

                        @php
                            $order = $marmitex . $bebidas;
                        @endphp

                        <input hidden name="order" value="{{ $order }}">
                        <input hidden name="total" value="{{ $totalCart::totalCart() }}">
                        <button type="submit" class="btn btn-primary "><i class="bi bi-check2-circle"></i> FINALIZAR
                            COMPRA</button>
                    </form>
                </div>

                <div class="col-lg-3 col-sm-4 col-4">
                    <a class="btn btn-danger  " href="{{ route('cart.empty') }}"><i class="bi bi-trash-fill"></i>
                        ESVAZIAR CARRINHO</a>
                </div>
                <div class="col-lg-3 col-sm-4 col-4">
                    <a class="btn btn-success " href="{{ route('menu') }}"><i class="bi bi-arrow-left"></i> RETORNAR AO
                        MENU</a>
                </div>
            </div>

        @else
            <h1 class="text-center"><i class="bi bi-cart-x"></i>
                <p>SEU CARRINHO ESTÁ VAZIO</p>
            </h1>
            <div class="d-flex justify-content-center">
                <a href="{{ route('menu') }}" class="btn btn-dark text-center">
                    PARA COMEÇAR A COMPRAR CLIQUE AQUI <p><i class="bi bi-arrow-up-circle" style="font-size: 30px"></i></p>
                </a>
            </div>

        @endif

    </div>

@endsection
