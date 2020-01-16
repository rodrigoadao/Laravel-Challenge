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
                  <td>{{ $filial->endereco}}</td>
                  <td>{{ $filial->ie }}</td>
                  <td>{{ $filial->cnpj }}</td>
                  <td class="img-commands">
                      <a href="{{ route('filial.show', $filial->id ) }}"><img src="../img/view.svg" alt=""></a>
                      <a href="{{ route('filial.edit', $filial->id ) }}"><img src="../img/update.svg" alt=""></a>
                      <a data-js="delete" href="{{ route('filial.delete', $filial->id) }}"><img src="../img/delete.svg" alt=""></a>
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