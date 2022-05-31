@extends('layouts.layout')

@section('content')

    <div class="container-fluid py-4">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <h1 class="text-center">Bebidas</h1>

        <div class="table-striped table-responsive-sm">
            <table class="table">
                <thead class="">
                    <tr class="bg-primary">
                        <td colspan="8">
                            <h4 class="text-light">Refrigerantes</h4>
                        </td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($drinks as $drink)

                        @if ($drink->type === 'refrigerante')
                            <tr>

                                <form action="{{ route('cart.addDrink') }}" method="POST">
                                    @csrf
                                    <td><img src="{{ asset('storage/app/' . $drink->image_path) }}" height="100px"></td>
                                    <td>{{ $drink->name }} {{ $drink->size }}
                                        {{ 'R$' . number_format($drink->price, 2, ',', '.') }}</td>
                                    <td><input class="col-xl-auto" style="width: 60px" type="number" name="quantity"
                                            value="0" min=1> </td>
                                    <td> <button class="btn btn-primary" type="submit">
                                            <i class="bi bi-plus" style="font-size: 20px"></i>ADICIONAR AO CARRINHO</button>
                                        <br>
                                    </td>

                                    <input hidden name="name" value="{{ $drink->name }}">
                                    <input hidden name="size" value="{{ $drink->size }}">
                                    <input hidden name="type" value="{{ $drink->type }}">
                                    <input hidden name="price" value="{{ $drink->price }}">

                                </form>
                            </tr>
                        @endif

                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-striped table-responsive-sm">
            <table class="table">
                <thead class="">
                    <tr class="bg-primary">
                        <td colspan="8">
                            <h4 class="text-light">Sucos</h4>
                        </td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($drinks as $drink)

                        @if ($drink->type === 'suco')
                            <tr>

                                <form action="{{ route('cart.addDrink') }}" method="POST">
                                    @csrf
                                    <td><img src="{{ asset('storage/app/' . $drink->image_path) }}" height="100px"></td>
                                    <td>{{ $drink->name }} {{ $drink->size }}
                                        {{ 'R$' . number_format($drink->price, 2, ',', '.') }}</td>
                                    <td> <input class="col-xl-auto" style="width: 60px" type="number" name="quantity"
                                            value="0" min=1> </td>
                                    <td> <button class="btn btn-primary" type="submit">
                                            <i class="bi bi-plus" style="font-size: 20px"></i>ADICIONAR AO CARRINHO</button>
                                        <br>
                                    </td>

                                    <input hidden name="name" value="{{ $drink->name }}">
                                    <input hidden name="size" value="{{ $drink->size }}">
                                    <input hidden name="type" value="{{ $drink->type }}">
                                    <input hidden name="price" value="{{ $drink->price }}">

                                </form>
                            </tr>
                        @endif

                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('menu') }}" class="btn btn-success"><i class="bi bi-arrow-left"></i> VOLTAR AO MENU</a>

    </div>

@endsection
