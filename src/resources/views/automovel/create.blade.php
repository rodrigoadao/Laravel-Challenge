@extends('painel')

@section('titulo','Cadastrar Novo Automovel')

@section('content')
<div class="modal-content">
<form action="{{ route('automovel.store')}}" method="post">
        <div class="form-title">
            <h1>Cadastrar Novo Automovel</h1>
        </div>
        <div class="form-group">
            @csrf
            <div class="row">
                <div class="col-4">  
                    <label for="nome">Nome: </label>
                    <input type="text"  class="form-control" name="nome" id="nome">
                </div>
                <div class="col-4">
                    <label for="ano">Ano: </label>
                    <input type="text"  class="form-control" name="ano" id="ano">
                </div>
                <div class="col-4">
                    <label for="modelo">Modelo: </label>
                    <input type="text"  class="form-control" name="modelo" id="modelo">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <label for="cor">Cor: </label>
                    <input type="text"  class="form-control" name="cor" id="cor">
                </div>
                <div class="col-4">
                    <label for="chassi">Numero Chassi: </label>
                    <input type="text"  class="form-control" name="chassi" id="chassi">
                </div>
                <div class="col-4">
                    <label for="categoria">Categoria: </label>
                    <select name="categoria"  class="form-control" id="categoria">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria }}">{{ $categoria }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="filial">Filial: </label>
                    <select name="filial_id"  class="form-control" id="filial">
                    @foreach ($filiais as $filial)
                        <option value="{{ $filial->id }}">{{ $filial->nome }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-end">
            <div class="col-2 mr-3">
                <a href="{{ route('automovel.index') }}" type="submit" class="btn btn-sucess form-control">Cancelar</a>
            </div>
            <div class="col-2 mr-3">
                <button type="submit" class="btn btn-sucess form-control">Cadastrar</button>
            </div>
        </div>
    </form>         
</div>
@endsection
@push('styles')
    <link href="../css/create.css" rel="stylesheet" type="text/css">
@endpush