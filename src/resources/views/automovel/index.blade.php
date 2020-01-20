@extends('painel')

@section('titulo','Automóveis Cadastrados')

@section('content')
<div class="modal-content">
  <div class="row justify-content-end my-3">
      <div class="col-6">
        <form class="form-inline"  data-js="formPesq" action="{{ route('automovel.search') }}" method="POST">
          @csrf
          <input class="form-control mr-sm-2 col-8" name="params" type="search" placeholder="Search" aria-label="Search">
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
                <td>{{ $automovel->ano}}</td>
                <td>{{ $automovel->modelo }}</td>
                <td>{{ $automovel->cor }}</td>
                <td>{{ $automovel->chassi }}</td>
                <td>{{ $automovel->categoria }}</td>
                <td class="img-commands">
                  <a href="{{ route('automovel.show', $automovel->id ) }}"><img src="../img/view.svg" alt="view"></a>
                  <a href="{{ route('automovel.edit', $automovel->id ) }}"><img src="../img/update.svg" alt="update"></a>
                  <a data-js="delete" href="{{ route('automovel.delete', $automovel->id) }}"><img src="../img/delete.svg" alt="delete"></a>
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