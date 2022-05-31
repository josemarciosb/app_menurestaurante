@extends('layouts.layout')

@section('content')

    <div class="container-fluid p-4">

        <h1> Menu </h1>

        <form method="POST" action="{{ route('cart.addMarmitex') }}">
            @csrf

            <h4 class="bg-primary text-light">Guarnição 1 (Arroz)</h4>
            <div class="row px-4 g-4 row-cols-md-4">

                @foreach ($guarnicoesArroz as $arroz)
                    <div class="col">
                        <div class="card" style="width: 300px;">
                            <img class="card-img-top" height="200px"
                                src="{{ asset('storage/app/' . $arroz->image_path) }}" alt="">
                            <div class="card-body">
                                <div class="form-check">
                                    <h5 class="card-title"> <input class="form-check-input" type="radio" name="guarnicao1"
                                            value="{{ $arroz->name }}"> {{ $arroz->name }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <h4 class="bg-primary text-light mt-4">Guarnição 2 (Feijão)</h4>
            <div class="row px-4 g-4 row-cols-md-4">
                @foreach ($guarnicoesFeijao as $feijao)
                    <div class="col">
                        <div class="card" style="width: 300px;">
                            <img class="card-img-top" height="200px"
                                src="{{ asset('storage/app/' . $feijao->image_path) }}" alt="">
                            <div class="card-body">
                                <div class="form-check">
                                    <h5 class="card-title"> <input class="form-check-input" type="radio" name="guarnicao2"
                                            value="{{ $feijao->name }}"> {{ $feijao->name }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @for ($i = 0; $i < $marmitex->qtd_carne; $i++)
                @php $n = $i + 1 @endphp
                @if ($i > 0)
                    @php
                        $add = 'adicional';
                    @endphp
                @else
                    @php
                        $add = '';
                    @endphp
                @endif
                <h4 class="bg-primary text-light mt-4">Carne {{ $add }}</h4>
                <div class="row px-4 g-4 row-cols-md-4">
                    @foreach ($carnes as $carne)
                        <div class="col">
                            <div class="card" style="width: 300px;">
                                <img class="card-img-top" height="200px"
                                    src="{{ asset('storage/app/' . $carne->image_path) }}" alt="">
                                <div class="card-body">
                                    <div class="form-check">
                                        <h5 class="card-title"> <input class="form-check-input" type="radio"
                                                name="carne{{ $n }}" value="{{ $carne->name }}">
                                            {{ $carne->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endfor

            @for ($i = 0; $i < $marmitex->qtd_massa; $i++)
                @php $n = $i + 1 @endphp
                @if ($i > 0)
                    @php
                        $add = 'adicional';
                    @endphp
                @else
                    @php
                        $add = '';
                    @endphp
                @endif
                <h4 class="bg-primary text-light mt-4">Massa {{ $add }}</h4>
                <div class="row px-4 g-4 row-cols-md-4">
                    @foreach ($massas as $massa)
                        <div class="col">
                            <div class="card" style="width: 300px;">
                                <img class="card-img-top" height="200px"
                                    src="{{ asset('storage/app/' . $massa->image_path) }}" alt="">
                                <div class="card-body">
                                    <div class="form-check">
                                        <h5 class="card-title"> <input class="form-check-input" type="radio"
                                                name="massa{{ $n }}" value="{{ $massa->name }}">
                                            {{ $massa->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endfor

            @for ($i = 0; $i < $marmitex->qtd_acompanhamento; $i++)
                @php $n = $i + 1 @endphp
                @if ($i > 0)
                    @php
                        $add = 'adicional';
                    @endphp
                @else
                    @php
                        $add = '';
                    @endphp
                @endif
                <h4 class="bg-primary text-light mt-4">Acompanhamento {{ $add }}</h4>
                <div class="row px-4 g-4 row-cols-md-4">
                    @foreach ($acompanhamentos as $acompanhamento)
                        <div class="col">
                            <div class="card" style="width: 300px;">
                                <img class="card-img-top" height="200px"
                                    src="{{ asset('storage/app/' . $acompanhamento->image_path) }}" alt="">
                                <div class="card-body">
                                    <div class="form-check">
                                        <h5 class="card-title"> <input class="form-check-input" type="radio"
                                                name="acompanhamento{{ $n }}"
                                                value="{{ $acompanhamento->name }}">
                                            {{ $acompanhamento->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endfor

            @for ($i = 0; $i < $marmitex->qtd_salada; $i++)
                @php $n = $i + 1 @endphp
                @if ($i > 0)
                    @php
                        $add = 'adicional';
                    @endphp
                @else
                    @php
                        $add = '';
                    @endphp
                @endif
                <h4 class="bg-primary text-light mt-4">Salada {{ $add }}</h4>
                <div class="row px-4 g-4 row-cols-md-4">
                    @foreach ($saladas as $salada)
                        <div class="col">
                            <div class="card" style="width: 300px;">
                                <img class="card-img-top" height="200px"
                                    src="{{ asset('storage/app/' . $salada->image_path) }}" alt="">
                                <div class="card-body">
                                    <div class="form-check">
                                        <h5 class="card-title"> <input class="form-check-input" type="radio"
                                                name="salada{{ $n }}" value="{{ $salada->name }}">
                                            {{ $salada->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endfor

            <input hidden name="price" value="{{ $price }}">
            <input hidden name="size" value="{{ $size }}">

            <button type="submit" class="btn btn-outline-primary m-2"><i class="bi bi-cart-plus"></i> ADICIONAR AO CARRINHO</button>
        </form>

    </div>


@endsection
