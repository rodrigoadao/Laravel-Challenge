@extends('painel')

@section('titulo','Filiais Cadastradas')

@section('content')
    <div class="modal-content">
      @if ( isset($errors) && count($errors) > 0)
      <div class="alert alert-danger">
          @foreach ( $errors->all() as $error)
              <p>{{ $error }}</p>
          @endforeach
      </div>
      @endif
        <div class="row justify-content-end my-3">
          <div class="col-6">
            <form class="form-inline"  data-js="formPesq" action="{{ route('filial.search') }}" method="POST">
              @csrf
              <input class="form-control mr-sm-2 col-8" name="params" type="search" placeholder="Pesquisar" aria-label="Search">
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
                <th scope="col">Nome</th>
                <th class="hcenter" scope="col">Endereço</th>
                <th class="hcenter" scope="col">IE</th>
                <th class="hcenter" scope="col">CNPJ</th>
                <th class="hcenter" scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach ( $filiais as $filial )
                <tr row >
                  <td>{{ $filial->nome }}</td>
                  <td class="hcenter" >{{ $filial->endereco}}</td>
                  <td class="hcenter" >{{ $filial->ie }}</td>
                  <td class="hcenter" >{{ $filial->cnpj }}</td>
                  <td class="img-commands hcenter">
                      <a href="{{ route('filial.show', $filial->id ) }}"><img src="../img/view.svg" title="visualizar"></a>
                      <a href="{{ route('filial.edit', $filial->id ) }}"><img src="../img/update.svg" title="alterar"></a>
                      <a data-js="delete" href="{{ route('filial.delete', $filial->id) }}"><img src="../img/delete.svg" title="deletar"></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="paginacao">
            {!! $filiais->links() !!}
          </div>
    </div>
@endsection
@push('styles')
    <link href="/css/index.css" rel="stylesheet" type="text/css">
@endpush
@push('scripts')
    <script src="{{ asset('js/utils.js') }}"></script>
@endpush