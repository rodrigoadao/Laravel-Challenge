<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} Desafio PHP</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/painel.css') }}" rel="stylesheet" type="text/css">
    @stack('styles')
</head>
<body>
    <div class="wrapper">
        <nav>
          <header>
            Desafio PHP
            <a></a>
          </header>
          <ul>
            <li><span>PAINEL ADMIN.</span></li>
          <li><a href="{{ route('funcionario.index') }}">Funcionário</a></li>
            <li><a href="{{ route('automovel.index') }}">Automovél</a></li>
            <li><a href="{{ route('filial.index') }}">Filial</a></li>
          </ul>
        </nav>
        <main>
            <h1>@yield('titulo')</h1>
            <div class="flex-grid">
                @yield('content')
            </div>
        </main>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
    @stack('scripts')
</body>
</html>+