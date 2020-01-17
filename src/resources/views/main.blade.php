@extends('painel')

@section('title','Teste')

@section('content')
    <img src="../img/laravel-logo-vector.svg" alt="Laravel Framework" width="600" style="margin: 0 auto;"> 
@endsection
@push('styles')
    <link href="/css/index.css" rel="stylesheet" type="text/css">
@endpush
@push('scripts')
    <script src="{{ asset('js/utils.js') }}"></script>
@endpush