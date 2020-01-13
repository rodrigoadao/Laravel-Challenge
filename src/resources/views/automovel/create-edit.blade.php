@extends('painel')

@section('titulo','Cadastrar Novo Automovel')

@section('content')
<div class="modal-content">
@if ( isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ( $errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if ( isset($automovel) )
    <form action="{{ route('automovel.update', $automovel->id)}}" method="post">
        {!! method_field('PUT') !!}
@else
    <form action="{{ route('automovel.store')}}" method="post">
@endif
        <div class="form-group">
            @csrf
            <div class="row">
                <div class="col-4">  
                    <label for="nome">Nome: </label>
                    <input type="text"  class="form-control" name="nome" id="nome" value="{{ $automovel->nome ?? old('nome') }}">
                </div>
                <div class="col-4">
                    <label for="ano">Ano: </label>
                    <input type="text"  class="form-control" name="ano" id="ano" maxlength="4" value="{{ $automovel->ano ?? old('ano') }}">
                </div>
                <div class="col-4">
                    <label for="modelo">Modelo: </label>
                    <input type="text"  class="form-control" name="modelo" id="modelo" value="{{ $automovel->modelo ?? old('modelo') }}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <label for="cor">Cor: </label>
                    <input type="text"  class="form-control" name="cor" id="cor" value="{{ $automovel->cor ?? old('cor') }}">
                </div>
                <div class="col-4">
                    <label for="chassi">Numero Chassi: </label>
                    <input type="text"  class="form-control" name="chassi" id="chassi" value="{{ $automovel->chassi ?? old('chassi') }}">
                </div>
                <div class="col-4">
                    <label for="categoria">Categoria: </label>
                    <select name="categoria"  class="form-control" id="categoria">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria }}"
                                @if ( isset($automovel) && $automovel->categoria == $categoria)
                                    selected
                                @endif
                            >{{ $categoria }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                    <label for="filial">Filial: </label>
                    <select name="filial_id"  class="form-control" id="filial">
                    @foreach ($filiais as $filial)
                        <option value="{{ $filial->id }}"
                            @if ( isset($automovel) && $automovel->filial_id == $filial->id)
                                selected
                            @endif
                            >{{ $filial->nome }}</option>
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
    <link href="/css/create.css" rel="stylesheet" type="text/css">
@endpush