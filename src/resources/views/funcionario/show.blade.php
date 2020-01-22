@extends('painel')

@section('titulo','Visualizar Funcionário')

@section('content')
    <div class="modal-content">
        <div class="form-group">
            <h1 class="title-pg"><b>{{$funcionario->nome}}</b></h1>
            <p><b>Nome: </b>  {{$funcionario->nome}} </p>
            <p><b>Endereço: </b>  {{$funcionario->endereco}} </p>
            <p><b>Data Nascimento: </b> {{ \Carbon\Carbon::parse($funcionario->dtNacimento)->format('d/m/Y')}} </p>
            <p><b>Sexo: </b>  {{$funcionario->sexo == 0 ? 'Masculino' : 'Feminino' }} </p>
            <p><b>CPF: </b>  {{$funcionario->cpf}} </p>
            <p><b>Cargo: </b>  {{$funcionario->cargo}} </p>
            <p><b>Salario: </b>  {{$funcionario->salario}} </p>
            <p><b>Situação: </b>  {{ $funcionario->situacao == 0 ? 'Desativado' : 'Ativo' }} </p>
            <div class="row justify-content-end">
                <div class="col-2 mr-3">
                    <a href="{{ route('funcionario.index') }}" class="btn btn-sucess form-control">Voltar</a>
                </div>
            </div>
        </div> 
    </div>
@endsection
@push('styles')
    <link href="/css/create.css" rel="stylesheet" type="text/css">
@endpush