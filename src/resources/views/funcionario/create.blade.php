@extends('painel')

@section('titulo','Cadastrar Novo Funcionário')

@section('content')
<div class="modal-content">
    <form action="" method="post">
        <div class="form-title">
            <h1>Cadastrar Novo Funcionário</h1>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-4">  
                    <label for="nome">Nome: </label>
                    <input type="text"  class="form-control" name="nome" id="nome">
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
                        <option value="">Ativo</option>
                        <option value="">Inativo</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
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