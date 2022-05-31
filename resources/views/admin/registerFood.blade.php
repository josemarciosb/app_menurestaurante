@extends('layouts.layoutAdmin')

@section('content')

    <div class="container-fluid py-4">

        <div class="card">
            <div class="card-header">
                <h2>Cadastrar Prato</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('dish.save') }}" enctype="multipart/form-data">
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
                                    placeholder="Ex: Arroz branco" required>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 mt-2">
                            <div class="form-group">
                                <label for="category">Categoria</label>
                                <select class="form-control form-control-sm" name="category">
                                    <option value="">Selecione</option>
                                    <option value="guarnição">Guarnição</option>
                                    <option value="carne">Carne</option>
                                    <option value="massa">Massa</option>
                                    <option value="acompanhamento">Acompanhamento</option>
                                    <option value="salada">Salada</option>
                                    <option value="sobremesa">Sobremesa</option>
                                </select>
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
