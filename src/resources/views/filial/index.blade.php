@extends('painel')

@section('titulo','Filiais Cadastradas')

@section('content')
    <div class="modal-content">
        <div class="row justify-content-end my-3">
                <div class="col-2 ">
                <a href="{{ route('filial.create')}}" class="btn btn-sucess form-control">Novo</a>
                </div>
        </div>
        <hr>
        <table class="table">
            <caption>Lista de Filiais</caption>
            <thead class="table-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
                <th scope="col">IE</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach ( $filiais as $filial )
                <tr row >
                  <td scope="row">{{ $filial->id }}</td>
                  <td>{{ $filial->nome }}</td>
                  <td>{{ $filial->endereco}}</td>
                  <td>{{ $filial->ie }}</td>
                  <td>{{ $filial->cnpj }}</td>
                  <td class="img-commands">
                      <a href="{{ route('filial.show', $filial->id ) }}"><img src="../img/view.svg" alt=""></a>
                      <a href="{{ route('filial.edit', $filial->id ) }}"><img src="../img/update.svg" alt=""></a>
                      <a href="{{ route('filial.delete', $filial->id) }}"><img src="../img/delete.svg" alt=""></a>
                      <a href=""><img src="../img/enable.svg" alt=""></a>
                      <a href=""><img src="../img/disable.svg" alt=""></a>
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