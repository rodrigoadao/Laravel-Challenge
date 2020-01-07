@extends('painel')

@section('titulo','Automoveis Cadastrados')

@section('content')
    <div class="modal-content">
        <div class="row justify-content-end my-3">
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
                <tr>
                  <th scope="row">{{ $funcionario->id }}</th>
                  <td>{{ $funcionario->nome }}</td>
                  <td>{{ $funcionario->dtNacimento}}</td>
                  <td>{{ $funcionario->sexo }}</td>
                  <td>{{ $funcionario->cpf }}</td>
                  <td>{{ $funcionario->endereco }}</td>
                  <td>{{ $funcionario->cargo }}</td>
                  <td>{{ $funcionario->salario }}</td>
                  <td>{{ $funcionario->situacao }}</td>
                  <td class="img-commands">
                      <a href=""><img src="../img/update.svg" alt=""></a>
                      <a href=""><img src="../img/delete.svg" alt=""></a>
                      <a href=""><img src="../img/enable.svg" alt=""></a>
                      <a href=""><img src="../img/disable.svg" alt=""></a>"
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