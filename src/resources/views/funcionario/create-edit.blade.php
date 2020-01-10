@extends('painel')

@section('titulo','Cadastrar Novo Funcionário')

@section('content')
<div class="modal-content">
    @if ( isset($errors) && count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ( $errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if ( isset($funcionario) )
    <form action="{{ route('funcionario.update', $funcionario->id)}}" method="post">
        {!! method_field('PUT') !!}
@else
    <form action="{{ route('funcionario.store')}}" method="post">
@endif
        <div class="form-group">
            @csrf
            <div class="row">
                <div class="col-4">  
                    <label for="nome">Nome: </label>
                    <input type="text"  class="form-control" name="nome" id="nome" value="{{ $funcionario->nome ?? old('nome') }}">
                </div>
                <div class="col-4">  
                    <label for="cpf">Cpf: </label>
                    <input type="text"  class="form-control" name="cpf" id="cpf" value="{{ $funcionario->cpf ?? old('cpf') }}">
                </div>
                <div class="col-4">
                    <label for="dtNacimento">Dt Nascimento: </label>
                    <input type="text"  class="form-control" name="dtNacimento" id="dtNacimento" value="{{ $funcionario->dtNacimento ?? old('dtNacimento') }}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <label for="sexo">Sexo: </label>
                    <input type="text" class="form-control" name="sexo" id="sexo" value="{{ $funcionario->sexo ?? old('sexo') }}">
                </div>
                <div class="col-4">
                    <label for="endereco">Endereço: </label>
                    <input type="text"  class="form-control" name="endereco" id="endereco" value="{{ $funcionario->endereco ?? old('endereco') }}">
                </div>
                <div class="col-4">
                    <label for="cargo">Cargo: </label>
                    <input type="text"  class="form-control" name="cargo" id="cargo" value="{{ $funcionario->cargo ?? old('cargo') }}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <label for="salario">Sálario: </label>
                    <input type="text"  class="form-control" name="salario" id="salario" value="{{ $funcionario->salario ?? old('salario') }}">
                </div>
                <div class="col-4">
                    <label for="filial">Filial: </label>
                    <select name="filial_id"  class="form-control" id="filial">
                        @foreach ($filiais as $filial)
                        <option value="{{ $filial->id }}"
                            @if ( isset($funcionario) && $funcionario->filial_id == $filial->id)
                                selected
                            @endif
                            >{{ $filial->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4 form-check">
                    <input type="checkbox" id="situacao" name="situacao" value="1" @if( isset($funcionario) && $funcionario->situacao == '1') checked @endif>
                    <label class="form-check-label" for="situacao">Ativo</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-end mt-5">
            <div class="col-2 mr-3" >
                <a href="{{ route('automovel.index') }}" type="submit" class="btn btn-sucess form-control">Cancelar</a>
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