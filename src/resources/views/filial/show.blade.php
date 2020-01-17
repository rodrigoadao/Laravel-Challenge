@extends('painel')

@section('titulo','Visualizar Filial')


@section('content')
    <div class="modal-content">
        <div class="form-group">
            <h1 class="title-pg"><b>{{$filial->nome}}</b></h1>
            <p><b>ID: </b> {{$filial->id}} </p>
            <p><b>Nome: </b>  {{$filial->nome}} </p>
            <p><b>Endereço: </b>  {{$filial->endereco}} </p>
            <p><b>Insc. Estadual: </b> {{$filial->ie}} </p>
            <p><b>CNPJ: </b>  {{$filial->cnpj}} </p>
            <div class="row justify-content-end">
                <div class="col-2 mr-3">
                    <a href="{{ route('filial.index') }}" class="btn btn-sucess form-control">Voltar</a>
                </div>
            </div>
        </div> 
    </div>
@endsection
@push('styles')
    <link href="/css/create.css" rel="stylesheet" type="text/css">
@endpush
