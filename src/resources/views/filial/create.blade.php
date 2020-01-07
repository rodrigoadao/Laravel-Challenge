@extends('painel')

@section('titulo','Cadastrar Nova Filial')

@section('content')
<div class="modal-content">
    <div class="form-title">
        <h1>Cadastrar Nova Filial</h1>
    </div>
    <form action="{{ route('filial.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">  
                    <label for="nome">Nome: </label>
                    <input type="text"  class="form-control" name="nome" id="nome">
                </div>
                <div class="col-md-4">
                    <label for="endereco">Endereço: </label>
                    <input type="text"  class="form-control" name="endereco" id="endereco">
                </div>
                <div class="col-md-4">
                    <label for="ie">Insc. Estadual: </label>
                    <input type="text"  class="form-control" name="ie" id="estado">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <label for="cnpj">CNPJ: </label>
                    <input type="text" class="form-control" name="cnpj" id="cnpj">
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-2 mr-3">
                <a href="{{ route('filial.index') }}" type="submit" class="btn btn-sucess form-control">Cancelar</a>
            </div>
            <div class="col-3 mr-3 ">
                <button type="submit" class="btn btn-sucess form-control">Cadastrar</button>
            </div>
        </div>
    </form>         
</div>
@endsection
@push('styles')
    <link href="../css/create.css" rel="stylesheet" type="text/css">
@endpush