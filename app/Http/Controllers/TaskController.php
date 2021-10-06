<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $lista = Task::all();
        return view('tasks.index', ['tasks'=>$lista]);
    }

    
    public function create()
    {
        return view('tasks.create');

    }
    
    
    public function store(Request $request)
    {

        $task = new Task; //Usa o modelo
        $task->task = $request->post('task'); //adiciona a task na coluna task
        $task->description = $request->post('description'); //adiciona a description na coluna description
        $task->checked = 0; //por padrão, adiciona false em checked
        $task->save(); //salva no banco (insert)
        
        return redirect()->to(route('tasks.index'));

    }

    
    public function show(Task $task)
    {
        // $task = Task::find($id);
        return view('tasks.show', ['task'=>$task]);

    }

    
    public function edit(Task $task)
    {
        return view('tasks.edit', ['task'=>$task]);

    }

    
    public function check(Task $task)
    {   
        if($task->checked) {
            $task->checked = 0;
        } else {
            $task->checked = 1;
        }
        $task->save();
        
        return redirect()->to(route('tasks.index'));
    }
    
    
    public function update(Request $request, Task $task)
    {
        $task->task = $request->post('task'); //adiciona a task na coluna task
        $task->description = $request->post('description'); //adiciona a description na coluna description
        $task->save();
        
        return redirect()->to(route('tasks.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        
    }
}
