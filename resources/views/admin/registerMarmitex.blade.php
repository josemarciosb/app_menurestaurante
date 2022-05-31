@extends('layouts.layoutAdmin')

@section('content')

    <div class="container-fluid py-4">

        <div class="card">
            <div class="card-header">
                <h2>Cadastrar Marmitex</h2>
            </div>
            <div class="card-body">

                <form method="POST" action="{{ route('marmitex.save') }}">
                    @csrf

                    @if ($errors->all())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <strong> {{ $error }} </strong>
                            </div>
                        @endforeach
                    @endif

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="size">Tamanho</label>
                                <select class="form-control form-control-sm" name="size" id="size" required>
                                    <option value="" selected>Selecione</option>
                                    <option value="Pequeno">Pequeno</option>
                                    <option value="Médio">Médio</option>
                                    <option value="Grande">Grande</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="price">Preço</label>
                                <input type="number" class="form-control form-control-sm" name="price"
                                    placeholder="Ex: 12.50" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="">Quantidade de guarnições permitidas</label>
                                <small class="form-text text-muted"><p>Quantidade de pratos que o cliente poderá escolher de
                                    guarnições
                                    (Arroz, feijão, etc)</p> </small>
                                <input type="number" class="form-control form-control-sm" name="qtd_guarnicao" required>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="">Quantidade de massas permitidas</label>
                                <small class="form-text text-muted"><p>Quantidade de pratos que o cliente poderá escolher de
                                    Massas
                                </p></small>
                                <input type="number" class="form-control form-control-sm" name="qtd_massa" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="">Quantidade de Carnes permitidas</label>
                                <small class="form-text text-muted"><p>Quantidade de pratos que o cliente poderá escolher de
                                    carnes</p></small>
                                <input type="number" class="form-control form-control-sm" name="qtd_carne" required>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="">Quantidade de Acompanhamento permitidas</label>
                                <small class="form-text text-muted"><p>Quantidade de pratos que o cliente poderá escolher de
                                    acompanhmentos</p></small>
                                <input type="number" class="form-control form-control-sm" name="qtd_acompanhamento"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="">Quantidade de Saladas permitidas</label>
                                <small class="form-text text-muted"><p>Quantidade de pratos que o cliente poderá escolher de
                                    saladas</p></small>
                                <input type="number" class="form-control form-control-sm" name="qtd_salada" required>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-outline-primary mt-3"><i class="bi bi-check2"></i> CADASTRAR</button>

                </form>
            </div>
        </div>
    </div>

@endsection
