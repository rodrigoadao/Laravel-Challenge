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
            <th scope="col">Comandos</th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $automoveis as $automovel )
              <tr>
                <th scope="row">{{ $automovel->id }}</th>
                <th>{{ $automovel->nome }}</th>
                <th>{{ $automovel-> }}</th>
                <th>{{ $automovel-> }}</th>
                <th>{{ $automovel-> }}</th>
                <th>{{ $automovel-> }}</th>
                <th>{{ $automovel-> }}</th>
                <td class="img-commands">
                  <a href=""><img src="../img/update.svg" alt="update"></a>
                  <a href=""><img src="../img/delete.svg" alt="delete"></a>
                  <a href=""><img src="../img/enable.svg" alt="enable"></a>
                  <a href=""><img src="../img/disable.svg" alt="disable"></a>"
              </td>
              </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('styles')
    <link href="../css/index.css" rel="stylesheet" type="text/css">
@endpush