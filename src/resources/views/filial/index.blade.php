@extends('painel')

@section('titulo','Automoveis Cadastrados')

@section('content')
    <div class="modal-content">
        <div class="row justify-content-end my-3">
                <div class="col-2 ">
                <a href="{{ route('filial.create')}}" class="btn btn-sucess form-control">Novo</a>
                </div>
        </div>
        <hr>
        <table class="table">
            <caption>Lista de Automovéis</caption>
            <thead class="table-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
                <th scope="col">IE</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Comandos</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td class="img-commands">
                    <a href=""><img src="../img/update.svg" alt=""></a>
                    <a href=""><img src="../img/delete.svg" alt=""></a>
                    <a href=""><img src="../img/enable.svg" alt=""></a>
                    <a href=""><img src="../img/disable.svg" alt=""></a>"
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>Thornton</td>
                <td class="img-commands">
                  <a href=""><img src="../img/update.svg" alt=""></a>
                  <a href=""><img src="../img/delete.svg" alt=""></a>
                  <a href=""><img src="../img/enable.svg" alt=""></a>
                  <a href=""><img src="../img/disable.svg" alt=""></a>"
              </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td>the Bird</td>
                <td class="img-commands">
                  <a href=""><img src="../img/update.svg" alt=""></a>
                  <a href=""><img src="../img/delete.svg" alt=""></a>
                  <a href=""><img src="../img/enable.svg" alt=""></a>
                  <a href=""><img src="../img/disable.svg" alt=""></a>"
              </td>
              </tr>
            </tbody>
          </table>
    </div>
@endsection
@push('styles')
    <link href="../css/index.css" rel="stylesheet" type="text/css">
@endpush