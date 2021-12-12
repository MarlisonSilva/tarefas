@extends('layout.template')
@section('title-content')
    <h1 class="h3 mb-0 text-gray-800">Editar Tarefa: {{ $task->task }}</h1>
@endsection
@section('content')
<form action="{{ route('tasks.update', ['task'=>$task->id]) }}" method="POST" class="user">
    @method('put')
    @csrf
    <div class="form-group">
        <label for="task">Tarefa</label>
        <input type="text" class="form-control" id="task" name="task" value="{{ $task->task }}"> 
    </div> 
    @error('task')
        <div class="alert alert-danger">{{ $errors->first('task') }}</div>                                         
    @enderror
    <div class="form-group">
        <label for="description">Descrição</label>
        <input type="text" class="form-control" id="description" name="description" value="{{ $task->description }}">
    </div> 
    @error('description')
        <div class="alert alert-danger">{{ $errors->first('description') }}</div>                                         
    @enderror

    <button type="submit" class="btn btn-primary">
        Enviar
    </button>
    <a href="#" onclick="window.history.back();" class="btn btn-secondary">
        Cancelar
    </a>
</form>
@endsection