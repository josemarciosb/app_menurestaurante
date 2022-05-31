@extends('layouts.layoutAdmin')

@section('content')

    <div class="container-fluid py-4">

        <div class="card">
            <div class="card-header">
                <h2>Cadastrar Bebida</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('drink.save') }}" enctype="multipart/form-data">
                    @csrf

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-12 col-sm-6 mt-2">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control form-control-sm" name="name"
                                    placeholder="Ex: Coca-Cola lata" required>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 mt-2">
                            <div class="form-group">
                                <label for="size">Tamanho</label>
                                <input type="text" class="form-control form-control-sm" name="size"
                                    placeholder="Digite a quantidade em ml ou litro ex: 350ml - 2l - 1,5l" require>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-6 mt-2">
                            <div class="form-group">
                                <label for="type">Tipo</label>
                                <select class="form-control form-control-sm" name="type" id="type" required>
                                    <option value="refrigerante">Refrigerante</option>
                                    <option value="suco">Suco</option>
                                    <option value="água">Água</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 mt-2">
                            <div class="form-group">
                                <label for="price">Preço</label>
                                <input type="text" class="form-control form-control-sm" name="price" placeholder="Ex: 3.50"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 mt-2">
                        <div class="form-group">
                            <label for="image">Foto</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="customFileLangHTML" name="image" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-primary"><i class="bi bi-check2"></i> CADASTRAR</button>

                </form>
            </div>
        </div>

    @endsection
