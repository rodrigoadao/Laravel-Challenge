@extends('painel')

@section('titulo','Cadastrar Novo Automovel')

@section('content')
<div class="modal-content">
    <form action="" method="post">
        <div class="form-title">
            <h1>Cadastrar Novo Automovel</h1>
        </div>
        <div class="form-group">
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
                    <label for="numeroChassi">Numero Chassi: </label>
                    <input type="text"  class="form-control" name="numeroChassi" id="numeroChassi">
                </div>
                <div class="col-4">
                    <label for="categoria">Categoria: </label>
                    <select name="categoria"  class="form-control" id="categoria">
                        <option value="">Entrada</option>
                        <option value="">Hatch pequeno</option>
                        <option value="">Hatch m�dio</option>
                        <option value="">Sed� m�dio</option>
                        <option value="">Sed� grande</option>
                        <option value="">SUV</option>
                        <option value="">Pick-ups</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-3 mr-3">
                <button type="submit" class="btn btn-sucess form-control">Cadastrar</button>
            </div>
        </div>
    </form>         
</div>
@endsection
@push('styles')
    <link href="../css/create.css" rel="stylesheet" type="text/css">
@endpush



{{-- <div class="modal-dialog col-lg-12 text-center">
    <div class="col-lg-12 main-section">
        <div class="col-lg-12 form-input">
            
        </div>
    </div>
</div> --}}