@extends('painel')

@section('titulo','Cadastrar Novo Funcionário')

@section('content')
<div class="modal-content">
    <form action="{{ route('funcionario.store') }}" method="post">
        <div class="form-title">
            <h1>Cadastrar Novo Funcionário</h1>
        </div>
        <div class="form-group">
            @csrf
            <div class="row">
                <div class="col-4">  
                    <label for="nome">Nome: </label>
                    <input type="text"  class="form-control" name="nome" id="nome">
                </div>
                <div class="col-4">  
                    <label for="cpf">Cpf: </label>
                    <input type="text"  class="form-control" name="cpf" id="cpf">
                </div>
                <div class="col-4">
                    <label for="dtNacimento">Dt Nascimento: </label>
                    <input type="text"  class="form-control" name="dtNacimento" id="dtNacimento">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <label for="sexo">Sexo: </label>
                    <input type="text" class="form-control" name="sexo" id="sexo">
                </div>
                <div class="col-4">
                    <label for="endereco">Endereço: </label>
                    <input type="text"  class="form-control" name="endereco" id="endereco">
                </div>
                <div class="col-4">
                    <label for="cargo">Cargo: </label>
                    <input type="text"  class="form-control" name="cargo" id="cargo">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <label for="salario">Sálario: </label>
                    <input type="text"  class="form-control" name="salario" id="salario">
                </div>
                <div class="col-4">
                    <label for="situacao">Situação: </label>
                    <select name="situacao"  class="form-control" id="situacao">
                        <option value="0">Ativo</option>
                        <option value="1">Inativo</option>
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
        <div class="row justify-content-end mt-5">
            <div class="col-2 mr-3" >
                <a href="{{ route('automovel.index') }}" type="submit" class="btn btn-sucess form-control">Cancelar</a>
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