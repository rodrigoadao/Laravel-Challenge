@extends('painel')

@section('titulo','Visualizar Filial')


@section('content')
    <div class="modal-content">
        <div class="form-group">
            <h1 class="title-pg"><b>{{$funcionario->nome}}</b></h1>
            <p><b>ID: </b> {{$funcionario->id}} </p>
            <p><b>Nome: </b>  {{$funcionario->nome}} </p>
            <p><b>Endereço: </b>  {{$funcionario->endereco}} </p>
            <p><b>Data Nascimento: </b> {{$funcionario->dtNacimento}} </p>
            <p><b>Sexo: </b>  {{$funcionario->sexo}} </p>
            <p><b>CPF: </b>  {{$funcionario->cpf}} </p>
            <p><b>Cargo: </b>  {{$funcionario->cargo}} </p>
            <p><b>Salario: </b>  {{$funcionario->salario}} </p>
            <p><b>Situação: </b>  {{$funcionario->situacao}} </p>
            <div class="row justify-content-end">
                <div class="col-2 mr-3">
                    <a href="{{ route('funcionario.index') }}" class="btn btn-sucess form-control">Cancelar</a>
                </div>
            </div>
        </div> 
    </div>
@endsection
@push('styles')
    <link href="/css/create.css" rel="stylesheet" type="text/css">
@endpush