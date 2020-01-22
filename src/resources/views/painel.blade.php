<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? '' }} - Desafio PHP</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/painel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/print.css') }}" rel="stylesheet" type="text/css" media="print">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
    @stack('styles')
</head>
<body>
    <div class="wrapper">
        <nav>
          <header>
            Desafio PHP
          </header>
          <ul>
            <li><span>PAINEL ADMIN.</span></li>
          <li><a href="{{ route('funcionario.index') }}"><img src="/img/funcionario.svg">Funcionário</a></li>
            <li><a href="{{ route('automovel.index') }}"><img src="/img/car.svg"> Automovél</a></li>
            <li><a href="{{ route('filial.index') }}"><img src="/img/filial.svg"> Filial</a></li>
            <hr>
            <li><a href="{{ route('funcionario.logout') }}"><img src="/img/exit.svg"> Sair</a></li>
          </ul>
        </nav>
        <main>
            <h1 data-js="titulo" class="titulo">@yield('titulo')</h1>
            <div class="flex-grid">
                @yield('content')
            </div>
        </main>
    </div>
    @stack('scripts')
</body>
</html>