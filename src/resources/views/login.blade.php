@extends('layouts.layout')

@section('title','Login')

@section('content')
    <div class="modal-dialog text-center">
        <div class="col-md-12 main-section">
            <div class="modal-content">
                <div class="col-md-12 user-img">
                    <img src="img/user.png">
                </div>
                <div class="col-md-12 form-input">
                    <div class="form-title">
                        <h1>Entrar</h1>
                    </div>
                    <form action="{{ route('funcionario.postLogin') }}" method="post">
                        @csrf
                        <div class="form-group cpf">
                            <input name="cpf" id="cpf" type="text" class="form-control" placeholder="Digite o CPF" maxlength="14" value="{{ old('cpf') }}">
                        </div>
                        <div class="form-group password">
                            <input name="password" type="password" class="form-control" placeholder="Digite a senha"  value="{{ old('password') }}">
                        </div>
                        @if ( isset($errors) && count($errors) > 0)
                        <div class="alert alert-info">
                            @foreach ( $errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                        @endif
                        <button type="submit" class="btn btn-sucess">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('styles')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css">
@endpush
@push('scripts')
<script src="{{ asset('js/utils.js') }}"></script>
<script>
    jQuery(function($){
        $('#cpf').mask('000.000.000-00', {reverse: true});
    })
</script>
@endpush
@endsection
