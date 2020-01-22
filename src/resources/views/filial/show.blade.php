@extends('painel')

@section('titulo','Visualizar Filial')


@section('content')
    <div class="modal-content">
        <div class="form-group">
            <h1 class="title-pg"><b>{{$filial->nome}}</b></h1>
            <p><b>Nome: </b>  {{$filial->nome}} </p>
            <p><b>Endereço: </b>  {{$filial->endereco}} </p>
            <p><b>Insc. Estadual: </b> {{$filial->ie}} </p>
            <p><b>CNPJ: </b> <span id="cnpj">{{$filial->cnpj}}</span></p>
            <div class="row justify-content-end">
                <div class="col-2 mr-3">
                    <a href="{{ route('filial.index') }}" class="btn btn-sucess form-control">Voltar</a>
                </div>
            </div>
        </div> 
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/utils.js') }}"></script>
    <script>
        jQuery(function($){
          $('#cnpj').mask('00.000.000/0000-00', {reverse: true})
        })
      </script>
@endpush