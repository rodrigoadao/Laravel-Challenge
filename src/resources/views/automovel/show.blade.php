@extends('painel')

@section('titulo','Visualizar Automóvel')


@section('content')
    <div class="modal-content">
        <div class="form-group">
            <h1 class="title-pg"><b>{{$automovel->nome}}</b></h1>
            <p><b>ID: </b> {{$automovel->id}} </p>
            <p><b>Nome: </b>  {{$automovel->nome}} </p>
            <p><b>Ano: </b>  {{$automovel->ano}} </p>
            <p><b>Modelo: </b> {{$automovel->modelo}} </p>
            <p><b>Cor: </b>  {{$automovel->cor}} </p>
            <p><b>Chassi: </b>  {{$automovel->chassi}} </p>
            <p><b>Categoria: </b>  {{$automovel->categoria}} </p>
            <div class="row justify-content-end">
                <div class="col-2 mr-3">
                    <a href="{{ route('automovel.index') }}" class="btn btn-sucess form-control">Voltar</a>
                </div>
            </div>
        </div> 
    </div>
@endsection
@push('styles')
    <link href="/css/create.css" rel="stylesheet" type="text/css">
@endpush