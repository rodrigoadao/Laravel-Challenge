@extends('painel')

@section('titulo','Filiais Cadastradas')
@section('content')
@if ( isset($errors) && count($errors) > 0)
    <script>
        $(document).ready(function() {
            $('#modalExemplo').modal('show');
        })
    </script>
@endif
<div class="modal-content">
  <!-- Modal -->
  <div class="modal fade" data-js="modal" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="modalExemplo" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
        <div class="modal-header" >
          <h4 class="modal-title" style="margin-left: 25%" data-js="modal-title"  id="modalExemplo"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" data-js="modal-body">
          <div class="alert alert-danger">
            <p>
            @foreach ( $errors->all() as $error)
                {{ $error }} <br><br>
            @endforeach
            </p>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-js="btnFechar" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" data-js="btnConfirm">Confirmar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END Modal -->
  <div class="row justify-content-end my-3 search">
    <div class="col-6">
      <form class="form-inline"  data-js="formPesq" action="{{ route('filial.search') }}" method="POST">
        @csrf
        <input class="form-control mr-sm-2 col-8" name="params" type="search" placeholder="Pesquisar" aria-label="Search" value="{{ $parametro ?? ''}}">
        <img data-js='imgSubmit' class="botao" src="../img/pesquisar.svg" alt="">
      </form>
    </div>
      <div class="col-2 ">
        <a href="{{ route('filial.create')}}" class="btn btn-sucess form-control">Novo</a>
      </div>
  </div>
  <hr>
  <table class="table">
      <thead class="table-dark">
        <tr>
          <th class="check hcenter"> <input type="checkbox" data-js="selectAll" class="selectAll" id=""></th>
          <th class="nome width-25"    scope="col ">NOME</th>
          <th class="hcenter width-20" scope="col">ENDEREÇO</th>
          <th class="hcenter width-15" scope="col">IE</th>
          <th class="hcenter width-20" scope="col">CNPJ</th>
          <th class="hcenter acoes width-20" scope="col">AÇÕES</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $filiais as $filial )
          <tr row class="unchecked">
            <td class="check"><input type="checkbox" data-js="select" class="select" value="{{ $filial->id }}"></td>
            <td>{{ $filial->nome }}</td>
            <td class="hcenter" >{{ $filial->endereco}}</td>
            <td class="hcenter" >{{ $filial->ie }}</td>
            <td class="hcenter" >{{ $filial->cnpj }}</td>
            <td class="img-commandsFunc hcenter">
              <form class="form-inline" action="" data-js="formActions">
                <div class="wrap-form hcenter">
                  <a href="{{ route('filial.show', $filial->id ) }}"><img src="../img/view.svg" title="Visualizar"></a>
                  <a href="{{ route('filial.edit', $filial->id ) }}"><img src="../img/update.svg" title="Alterar"></a>
                  <a data-js="delete" href="{{ route('filial.delete', $filial->id) }}"><img src="../img/delete.svg" title="Deletar"></a>
                </div>  
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="paginacao">
      {!! $filiais->links() !!}
    </div>
    <div class="row justify-content-end">
      <form data-js="formIDs" action="{{route('download.filial')}}" method="POST">
        @csrf
        <input type="hidden" data-js="inputIds" name="ids" >
        <button data-js="Excel" class="btn btn-sucess form-control exportar excel" type="submit">Exportar Excel</button>
      </form>
      <div>
        <button data-js="Pdf" class="btn btn-sucess form-control exportar "  value="Pdf" type="submit">Exportar PDF</button>
      </div>
    </div>
</div>
@endsection
@push('styles')
    <link href="/css/index.css" rel="stylesheet" type="text/css">
@endpush
@push('scripts')
    <script src="{{ asset('js/utils.js') }}"></script>
@endpush