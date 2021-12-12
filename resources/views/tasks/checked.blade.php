@extends('layout.template')
@section('title-content')
    <h1 class="h3 mb-0 text-gray-800">Tarefas Concluídas</h1>
@endsection
@section('content')
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Tarefa</th>
                <th>Descrição</th>
                <th>Concluída?</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Tarefa</th>
                <th>Descrição</th>
                <th>Concluída?</th>
                <th>Ações</th>
            </tr>
        </tfoot>
        <tbody>

            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->task }}</td>
                    <td>{{ $task->description }}</td>
                    <td>
                        @if ($task->checked)
                            Sim
                        @else
                            Não
                        @endif
                    </td>
                    <td style="display: flex; justify-content: space-evenly;">
                        <a href="#" onclick="document.querySelector('#check_{{ $task->id }}').submit();" title="Marcar como (não) feita">
                            <i class="bi bi-check-circle-fill"></i>
                        </a>
                        <a href="#" onclick="document.querySelector('#edit_{{ $task->id }}').submit();" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="#" onclick="document.querySelector('#show_{{ $task->id }}').submit();" title="Ver">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                        <a href="#" onclick="document.querySelector('#destroy_{{ $task->id }}').submit();" title="Apagar">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
                <form id="check_{{ $task->id }}" action="{{ route('tasks.check', ['task' => $task->id]) }}"
                    method="POST"> @csrf</form>
                <form id="edit_{{ $task->id }}" action="{{ route('tasks.edit', ['task' => $task->id]) }}"
                    method="GET"></form>
                <form id="show_{{ $task->id }}" action="{{ route('tasks.show', ['task' => $task->id]) }}"
                    method="GET"></form>
                <form id="destroy_{{ $task->id }}" action="{{ route('tasks.destroy', ['task' => $task->id]) }}"
                    method="POST"> @method('delete') </form>
            @endforeach
        </tbody>
    </table>
</div>
@endsection