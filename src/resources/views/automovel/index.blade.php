@extends('painel')

@section('titulo','Automoveis Cadastrados')

@section('content')
<div class="modal-content">
  <div class="row justify-content-end my-3">
          <div class="col-2 ">
          <a href="{{ route('automovel.create')}}" class="btn btn-sucess form-control">Novo</a>
          </div>
  </div>
  <hr>
    <table class="table">
        <caption>Lista de Automovéis</caption>
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Ano</th>
            <th scope="col">Modelo</th>
            <th scope="col">Cor</th>
            <th scope="col">Nº de chassi</th>
            <th scope="col">Categoria</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $automoveis as $automovel )
              <tr row >
                <th scope="row">{{ $automovel->id }}</th>
                <td>{{ $automovel->nome }}</td>
                <td>{{ $automovel->ano}}</td>
                <td>{{ $automovel->modelo }}</td>
                <td>{{ $automovel->cor }}</td>
                <td>{{ $automovel->chassi }}</td>
                <td>{{ $automovel->categoria }}</td>
                <td class="img-commands">
                  <a href="{{ route('automovel.show', $automovel->id ) }}"><img src="../img/view.svg" alt="view"></a>
                  <a href="{{ route('automovel.edit', $automovel->id ) }}"><img src="../img/update.svg" alt="update"></a>
                  <a href="{{ route('automovel.delete', $automovel->id) }}"><img src="../img/delete.svg" alt="delete"></a>
                  <a href=""><img src="../img/enable.svg" alt="enable"></a>
                  <a href=""><img src="../img/disable.svg" alt="disable"></a>
              </td>
              </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('styles')
    <link href="/css/index.css" rel="stylesheet" type="text/css">
@endpush