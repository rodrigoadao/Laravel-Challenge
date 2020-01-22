@extends('painel')

@section('titulo','Automóveis Cadastrados')

@section('content')
<div class="modal-content">
  <!-- Modal -->
  <div class="modal fade" data-js="modal" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" >
        <div class="modal-header">
          <h4 class="modal-title"  style="margin-left: 25%" data-js="modal-title"  id="exampleModalLabel"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" data-js="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-js="btnFechar" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary" data-js="btnConfirm">Confirmar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END Modal -->
  <div class="row justify-content-end my-3">
      <div class="col-6">
        <form class="form-inline"  data-js="formPesq" action="{{ route('automovel.search') }}" method="POST">
          @csrf
          <input class="form-control mr-sm-2 col-8" name="params" type="search" placeholder="Pesquisar" aria-label="Search">
          <img data-js='imgSubmit' class="botao" src="../img/pesquisar.svg" alt="">
        </form>
      </div>
      <div class="col-2 ">
        <a href="{{ route('automovel.create')}}" class="btn btn-sucess form-control">Novo</a>
      </div>
  </div>
  <hr>
    <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">Nome</th>
            <th class="hcenter" scope="col">Ano</th>
            <th class="hcenter" scope="col">Modelo</th>
            <th class="hcenter" scope="col">Cor</th>
            <th class="hcenter" scope="col">Nº de chassi</th>
            <th class="hcenter" scope="col">Categoria</th>
            <th class="hcenter" scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $automoveis as $automovel )
              <tr row >
                <td>{{ $automovel->nome }}</td>
                <td class="hcenter" >{{ $automovel->ano}}</td>
                <td class="hcenter" >{{ $automovel->modelo }}</td>
                <td class="hcenter" >{{ $automovel->cor }}</td>
                <td class="hcenter" >{{ $automovel->chassi }}</td>
                <td class="hcenter" >{{ $automovel->categoria }}</td>
                <td class="img-commands hcenter">
                  <form class="form-inline" action="" data-js="formActions">
                    <a href="{{ route('automovel.show', $automovel->id ) }}"><img src="../img/view.svg" title="visualizar"></a>
                    <a href="{{ route('automovel.edit', $automovel->id ) }}"><img src="../img/update.svg" title="alterar"></a>
                    <a data-js="delete" href="{{ route('automovel.delete', $automovel->id) }}"><img src="../img/delete.svg" title="deletar"></a>
                  </form>
              </td>
              </tr>
          @endforeach
        </tbody>
    </table>
    <div class="paginacao">
      {!! $automoveis->links() !!}
    </div>
</div>
@endsection
@push('styles')
    <link href="/css/index.css" rel="stylesheet" type="text/css">
@endpush
@push('scripts')
    <script src="{{ asset('js/utils.js') }}"></script>
@endpush