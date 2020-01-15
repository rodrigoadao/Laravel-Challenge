@extends('painel')

@section('titulo','Cadastrar Novo Funcionário')

@section('content')


@if ( isset($errors) && count($errors) > 0)
    <script>
        $(document).ready(function() {
            $('#exampleModalLong').modal('show');
        })
    </script>
@endif
<div class="modal-content">
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Erro ao cadastrar funcionário.</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="alert alert-danger">
                    <p>
                    @foreach ( $errors->all() as $error)
                        {{ $error }} <br><br>
                    @endforeach
                    </p>
                </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sucess" data-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>
<!-- Modal Fim -->
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
                    <input type="text"  class="form-control"  data-js="cpf" maxlength="14" name="cpf" id="cpf" value="{{ $funcionario->cpf ?? old('cpf') }}">
                </div>
                <div class="col-4">
                    <label for="dtNacimento">Data Nascimento: </label>
                    <input type="text"  class="form-control" data-js="dtNasc" name="dtNacimento" id="dtNacimento" maxlength="10" value="{{ $funcionario->dtNacimento ?? old('dtNacimento') }}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <label for="endereco">Endereço: </label>
                    <input type="text"  class="form-control" name="endereco" id="endereco" value="{{ $funcionario->endereco ?? old('endereco') }}">
                </div>
                <div class="col-4">
                    <label for="cargo">Cargo: </label>
                    <input type="text"  class="form-control" name="cargo" id="cargo" value="{{ $funcionario->cargo ?? old('cargo') }}">
                </div> 
                <div class="col-4">
                    <label for="salario">Sálario: </label>
                    <input type="text" data-js="salario" class="form-control" name="salario" id="salario" value="{{ $funcionario->salario ?? old('salario') }}">
                    <input type="hidden" name="hiddensalario" data-js="hiddensalario"  >
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <label for="sexo">Sexo:</label>
                    <select name="sexo" class="form-control" id="sexo">
                        <option></option>
                        <option value="0">Masculino</option>
                        <option value="1">Feminino</option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="filial">Filial: </label>
                    <select name="filial_id"  class="form-control" id="filial">
                        <option></option>
                        @foreach ($filiais as $filial)
                        <option value="{{ $filial->id }}"
                            @if ( isset($funcionario) && $funcionario->filial_id == $filial->id)
                                selected
                            @endif
                            >{{ $filial->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-4">
                        <label for="password">Senha: </label>
                        <input type="text"  class="form-control" name="password" id="password" value="{{ $funcionario->password ?? '1234' }}">
                </div>
            </div>
            <div class="row">
                <div class="col-4 form-check">
                    <input type="checkbox" id="situacao" name="situacao" value="1" @if( isset($funcionario) && $funcionario->situacao == '1') checked @endif>
                    <label class="form-check-label" for="situacao">Ativo</label>
                </div>
            </div>
        </div>
        <div class="row justify-content-end mt-5">
            <div class="col-2 mr-3" >
                <a href="{{ route('funcionario.index') }}" type="submit" class="btn btn-sucess form-control">Cancelar</a>
            </div>
            <div class="col-2 mr-3 ">
                <button type="submit" class="btn btn-sucess form-control">Salvar</button>
            </div>
        </div>
    </form>         
</div>
@endsection
@push('styles')
    <link href="/css/create.css" rel="stylesheet" type="text/css">
@endpush
@push('scripts')
    <script src="{{ asset('js/utils.js') }}"></script>
@endpush