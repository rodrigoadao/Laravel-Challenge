@extends('painel')

@section('titulo','Cadastrar Nova Filial')


@section('content')
<div class="modal-content">
    @if ( isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            @foreach ( $errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if ( isset($filial) )
        <form action="{{ route('filial.update', $filial->id)}}" method="post">
            {!! method_field('PUT') !!}
    @else
        <form action="{{ route('filial.store')}}" method="post">
    @endif
    
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">  
                    <label for="nome">Nome: </label>
                    <input type="text"  class="form-control" name="nome" id="nome" value="{{ $filial->nome ?? old('nome') }}">
                </div>
                <div class="col-md-4">
                    <label for="endereco">Endereço: </label>
                    <input type="text"  class="form-control" name="endereco" id="endereco" value="{{ $filial->endereco ?? old('endereco') }}">
                </div>
                <div class="col-md-4">
                    <label for="ie">Insc. Estadual: </label>
                    <input type="text"  class="form-control" name="ie" id="estado" value="{{ $filial->ie ?? old('ie') }}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <label for="cnpj">CNPJ: </label>
                    <input type="text" class="form-control" name="cnpj" id="cnpj"  value="{{ $filial->cnpj ?? old('cnpj') }}">
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-2 mr-3">
                <a href="{{ route('filial.index') }}" type="submit" class="btn btn-sucess form-control">Cancelar</a>
            </div>
            <div class="col-2 mr-3 ">
                <button type="submit" class="btn btn-sucess form-control">Enviar</button>
            </div>
        </div>
    </form>         
</div>
@endsection
@push('styles')
    <link href="/css/create.css" rel="stylesheet" type="text/css">
@endpush