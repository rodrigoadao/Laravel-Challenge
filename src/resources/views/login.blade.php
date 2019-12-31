@extends('layouts.layout')

@section('title','Login')


@section('content')
    <div class="modal-dialog text-center">
        <div class="col-sm-11 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="img/user.png">
                </div>
                <div class="col-12 form-input">
                    <div class="form-title">
                        <h1>Entrar</h1>
                    </div>
                    <form action="">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Digite o CPF" maxlength="5">
                        </div>
                        <button type="submit" class="btn btn-sucess">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link href="css/login.css" rel="stylesheet" type="text/css">
@endpush