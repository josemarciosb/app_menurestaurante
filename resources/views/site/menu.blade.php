@extends('layouts.layout')

@section('content')

    <div class="container-fluid">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($errors->all())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <h1> Escolha seu marmitex </h1>

        <div class="row">

            @foreach ($marmitexes as $marmitex)

                <div class="col-sm-12 col-xl-3 col-lg-3 col-md-3 py-1">
                    <a class="btn btn-primary col-12 "
                        href="{{ route('dish.showBuffet', ['price' => $marmitex->price, 'size' => $marmitex->size]) }}">
                        <h3><i class="material-icons " style="font-size: 30px; vertical-align: -5px;">dinner_dining</i> Marmitex {{ $marmitex->size }}<br> R${{ number_format($marmitex->price, 2, ',', '.') }}</h3><br>
                        {{ $marmitex->qtd_guarnicao }} Guarnições (Arroz e feijão), {{ $marmitex->qtd_massa }} massa(s),
                        {{ $marmitex->qtd_carne }} carne(s), {{ $marmitex->qtd_acompanhamento }} acompanhamento(s)
                        e {{ $marmitex->qtd_salada }} salada(s)
                    </a>
                </div>

            @endforeach
        </div>

        <h2> Peça também sua bebida </h2>
        <div class="row">
            <div class="col-sm-12 col-lg-3 col-xl-3 col-md-3 py-1">
                <a class="btn btn-success col-12" href="{{ route('dish.showDrink') }}">
                    <h3><i class="bi bi-cup-straw"></i> Bebidas</h3>
                    Refrigerantes e sucos
                </a>
            </div>
        </div>

    </div>


@endsection
