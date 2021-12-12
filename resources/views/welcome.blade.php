@extends('layout.template')
@section('title-content')
    <h1>Bem-vindo!</h1>
    
@endsection
@section('content')    
    <a class="btn btn-primary" href="{{ route('dashboard') }}">Ir para a página principal</a>
@endsection