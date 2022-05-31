@extends('layouts.layoutAdmin')

@section('content')

    <div class="container-fluid py-4">

        <div class="card">
            <div class="card-header bg-danger">
                <h2 class="text-light">Editar Marmitex</h2>
            </div>
            <div class="card-body">

                @foreach ($marmitexes as $marmitex)
                    <h4 class="mt-2">Marmitex {{ $marmitex->size }} </h4>
                    <form method="POST" action="{{ route('marmitex.update') }}">
                        @csrf
                        @method('PUT')

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

                        <input hidden value="{{ $marmitex->id }}" name="id">
                        <input hidden value="{{ $marmitex->size }}" name="size">

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="size">Tamanho</label>
                                    <select class="form-control form-control-sm" id="size" disabled>
                                        <option value="{{ $marmitex->size }}" selected>{{ $marmitex->size }}</option>
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
                                        placeholder="Ex: 12.50" value="{{ $marmitex->price }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Quantidade de guarnições permitidas</label>
                                    <small class="form-text text-muted"><p>Quantidade de pratos que o cliente poderá escolher
                                        de guarnições (Arroz, feijão, etc) </p></small>
                                    <input type="number" class="form-control form-control-sm" name="qtd_guarnicao"
                                      value="{{ $marmitex->qtd_guarnicao }}" required>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Quantidade de massas permitidas</label>
                                    <small class="form-text text-muted"><p>Quantidade de pratos que o cliente poderá escolher
                                        de massas
                                    </p></small>
                                    <input type="number" class="form-control form-control-sm" name="qtd_massa"
                                        value="{{ $marmitex->qtd_massa }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Quantidade de Carnes permitidas</label>
                                    <small class="form-text text-muted"><p>Quantidade de pratos que o cliente poderá escolher
                                        de carnes</p></small>
                                    <input type="number" class="form-control form-control-sm" name="qtd_carne"
                                        value="{{ $marmitex->qtd_carne }}" required>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Quantidade de Acompanhamento permitidas</label>
                                    <small class="form-text text-muted"><p>Quantidade de pratos que o cliente poderá escolher
                                        de acompanhmentos</p></small>
                                    <input type="number" class="form-control form-control-sm" name="qtd_acompanhamento"
                                        value="{{ $marmitex->qtd_acompanhamento }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Quantidade de Saladas permitidas</label>
                                    <small class="form-text text-muted"><p>Quantidade de pratos que o cliente poderá escolher
                                        de saladas</p></small>
                                    <input type="number" class="form-control form-control-sm" name="qtd_salada"
                                        value="{{ $marmitex->qtd_salada }}" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 mt-auto">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i> ATUALIZAR</button>
                                <a href="{{ route('marmitex.delete', ['id' => $marmitex->id ]) }}" class="btn btn-danger ml-1"><i class="bi bi-trash"></i> EXCLUIR</a>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>

                    </form>

                @endforeach

            </div>
        </div>
    </div>

@endsection
