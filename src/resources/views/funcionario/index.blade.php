@extends('painel')

@section('title','Listagem de Funcionários')
@section('titulo','Funcionários Cadastrados')

@section('content')
  <div class="modal-content">
      <div class="row justify-content-end my-3 search">
            <div class="col-6">
              <form class="form-inline"  data-js="formPesq" action="{{ route('funcionario.search') }}" method="POST">
                @csrf
                <input class="form-control mr-sm-2 col-8" name="params" type="search" placeholder="Pesquisar" aria-label="Search">
                <img data-js='imgSubmit' class="botao" src="../img/pesquisar.svg" alt="">
              </form>
            </div>
            <div class="col-2">
              <a href="{{ route('funcionario.create')}}" class="btn btn-sucess form-control">Novo</a>
            </div>
      </div>
      <hr>
      <table class="table">
         @if ($funcionarios->items() == null)
             <caption>Nenhum registro encontrado!</caption>
         @endif
          <thead class="table-dark">
            <tr>
              <th class="check hcenter"> <input type="checkbox" data-js="selectAll" class="selectAll" id=""></th>
              <th class="nome width-30" scope="col">Nome</th>
              {{-- <th class="hcenter width-10" scope="col">Data nascimento</th>
              <th class="hcenter width-10" scope="col">Sexo</th> --}}
              <th class="hcenter width-20" scope="col">CPF</th>
              {{-- <th class="hcenter width-10" scope="col">Endereço</th> --}}
              <th class="hcenter width-15" scope="col">Cargo</th>
              {{-- <th class="hcenter width-10" scope="col">Salário</th> --}}
              <th class="hcenter width-15" scope="col">Situação</th>
              <th class="hcenter acoes width-20" scope="col">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ( $funcionarios as $funcionario )
              <tr class="unchecked" row @if ($funcionario->situacao == 0 ) disable @endif>
                <td class="check"><input type="checkbox" data-js="select" class="select" id=""></td>
                <td>{{ $funcionario->nome }}</td>
                {{-- <td>{{ \Carbon\Carbon::parse($funcionario->dtNacimento)->format('d/m/Y') }}</td>
                <td>{{ $funcionario->sexo == 0 ? 'Masculino' : 'Feminino' }}</td> --}}
                <td class="hcenter">{{ $funcionario->cpf  }}</td>
                {{-- <td>{{ $funcionario->endereco }}</td> --}}
                <td class="hcenter">{{ $funcionario->cargo }}</td>
                {{-- <td>{{ $funcionario->salario }}</td> --}}
                <td class="hcenter">{{ $funcionario->situacao == 0 ? 'Desativado' : 'Ativo' }}</td>
                <td class="img-commandsFunc hcenter">
                  <a href="{{ route('funcionario.show', $funcionario->id ) }}"><img id="teste" src="../img/view.svg" title="visualizar"></a>
                  <a href="{{ route('funcionario.edit', $funcionario->id ) }}"><img src="../img/update.svg" title="alterar"></a>
                  <a data-js="delete" href="{{ route('funcionario.delete', $funcionario->id) }}"><img src="../img/delete.svg" title="deletar"></a>
                  @if ($funcionario->situacao == 0 )
                    <a  data-js="active" href="{{ route('funcionario.active', $funcionario->id) }}"><img src="../img/enable.svg" title="habilitar"></a>
                  @else
                    <a  data-js="disable" href="{{ route('funcionario.disable', $funcionario->id) }}"><img src="../img/disable.svg" title="disabilitar"></a>
                  @endif    
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="paginacao">
          {!! $funcionarios->links() !!}
        </div>
        <div class="row justify-content-end">
          <div>
            <button data-js="Excel" class="btn btn-sucess form-control exportar" type="submit">Exportar Excel</button>
          </div>
          <div>
            <button data-js="Pdf" class="btn btn-sucess form-control exportar" type="submit">Exportar PDF</button>
          </div>
        </div>
  </div>
@endsection
@push('styles')
    <link href="/css/index.css" rel="stylesheet" type="text/css">
@endpush
@push('scripts')
    <script src="{{ asset('js/utils.js') }}"></script>
@endpush