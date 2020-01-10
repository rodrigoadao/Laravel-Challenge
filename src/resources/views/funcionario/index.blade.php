@extends('painel')

@section('titulo','Funcionarios Cadastrados')

@section('content')
  <div class="modal-content">
      <div class="row justify-content-end my-3">
            <div class="col-6">
              <form class="form-inline">
                <input class="form-control mr-sm-2 col-8" type="search" placeholder="Search" aria-label="Search">
                <a href=""><img src="../img/pesquisar.svg" alt=""></a>
            </div>
            <div class="col-2 ">
              <a href="{{ route('funcionario.create')}}" class="btn btn-sucess form-control">Novo</a>
            </div>
      </div>
      <hr>
      <table class="table">
          <caption>Lista de Funcionarios</caption>
          <thead class="table-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Data nascimento</th>
              <th scope="col">Sexo</th>
              <th scope="col">CPF</th>
              <th scope="col">Endereço</th>
              <th scope="col">Cargo</th>
              <th scope="col">Salário</th>
              <th scope="col">Situação</th>
              <th scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $funcionarios as $funcionario )
              <tr row @if ($funcionario->situacao == 0 ) disable @endif>
                <th scope="row">{{ $funcionario->id }}</th>
                <td>{{ $funcionario->nome }}</td>
                <td>{{ $funcionario->dtNacimento}}</td>
                <td>{{ $funcionario->sexo }}</td>
                <td>{{ $funcionario->cpf }}</td>
                <td>{{ $funcionario->endereco }}</td>
                <td>{{ $funcionario->cargo }}</td>
                <td>{{ $funcionario->salario }}</td>
                <td>{{ $funcionario->situacao }}</td>
                <td class="img-commandsFunc">
                  <a href="{{ route('funcionario.show', $funcionario->id ) }}"><img src="../img/view.svg" alt=""></a>
                  <a href="{{ route('funcionario.edit', $funcionario->id ) }}"><img src="../img/update.svg" alt=""></a>
                  <a href="{{ route('funcionario.delete', $funcionario->id) }}"><img src="../img/delete.svg" alt=""></a>
                  @if ($funcionario->situacao == 0 )
                    <a href="{{ route('funcionario.active', $funcionario->id) }}"><img src="../img/enable.svg" alt=""></a>
                  @else
                    <a href="{{ route('funcionario.disable', $funcionario->id) }}"><img src="../img/disable.svg" alt=""></a>
                  @endif    
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="paginacao">
          {!! $funcionarios->links() !!}
        </div>
  </div>
@endsection
@push('styles')
    <link href="/css/index.css" rel="stylesheet" type="text/css">
@endpush