@extends('painel')
@section('titulo','Cadastrar Nova Filial')
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
                <h5 class="modal-title" id="exampleModalLongTitle">Erro ao cadastrar filial.</h5>
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

    @if ( isset($filial) )
        <form action="{{ route('filial.update', $filial->id)}}" method="post">
            {!! method_field('PUT') !!}
    @else
        <form action="{{ route('filial.store')}}" method="post">
    @endif
    
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">  
                    <label for="nome">Nome: </label>
                    <input type="text"  class="form-control" name="nome" id="nome" value="{{ old('nome') }}">
                </div>
                <div class="col-md-4">
                    <label for="endereco">Endereço: </label>
                    <input type="text"  class="form-control" name="endereco" id="endereco" value="{{old('endereco') }}">
                </div>
                <div class="col-md-4">
                    <label for="ie">Inscrição Estadual: </label>
                    <input type="text" data-js="ie" class="form-control" data-js="ie" name="ie" maxlength="10" id="estado" value="{{ old('ie') }}">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <label for="cnpj">CNPJ: </label>
                    <input type="text" data-js="cnpj" class="form-control" name="cnpj" id="cnpj"  data-js="cnpj" maxlength="18"  value="{{ old('cnpj') }}">
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-2 mr-3">
                <a href="{{ route('filial.index') }}" type="submit" class="btn btn-sucess form-control">Cancelar</a>
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