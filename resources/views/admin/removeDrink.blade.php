@extends('layouts.layoutAdmin')

@section('content')

    <div class="container-fluid py-4">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                <strong>{{ $message }}</strong>
            </div>
        @endif


        <table class="table table-striped table-responsive-sm">
            <thead class="">
                <tr class="bg-danger">
                    <td colspan="8">
                        <h4 class="text-light">Excluir Bebidas</h4>
                    </td>
                </tr>
            </thead>
            <tbody>

                @foreach ($drinks as $drink)

                    <tr>
                        <form action="{{ route('drink.delete') }}" method="POST">
                            @csrf
                            @method('delete')

                            <td><img src="{{ asset('storage/app/' . $drink->image_path) }}" height="100px"></td>
                            <td>{{ $drink->name }} {{ $drink->size }}
                                {{ 'R$' . number_format($drink->price, 2, ',', '.') }}</td>

                            <input hidden name="id" value="{{ $drink->id }}">

                            <td> <button class="btn btn-danger" type="submit"><i class="bi bi-trash"></i> EXCLUIR</button>
                                <br> </td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </form>
                    </tr>

                @endforeach
            </tbody>
        </table>

    </div>

@endsection
