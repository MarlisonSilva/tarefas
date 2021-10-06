@extends('layout.template')
@section('title-content')
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
@endsection
@section('content')
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Ver tarefas</a>    
@endsection