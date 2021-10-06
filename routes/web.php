<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;
use App\Models\Task;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/template', function(){
    return view('layout.template');
});

Route::get('/dashboard', function () {
    return view('dashboard.home');
})->middleware(['auth'])->name('dashboard');

//  ------- Registrando rotas individualmente -------
/*
Route::get('/dashboard/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/dashboard/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

Route::post('/dashboard/tasks/store', [TaskController::class, 'store'])->name('tasks.store');

Route::post('/dashboard/tasks/{id}/show', [TaskController::class, 'show'])->name('tasks.show');
*/

Route::post('/tasks/{task}/check', [TaskController::class, 'check'])
    ->name('tasks.check');
    
Route::resource('/tasks', TaskController::class);

// Route::get('/login', function (){
//     return view('auth.login');
// });

// Route::get('/register', function (){
//     return view('auth.register');
// });

require __DIR__.'/auth.php';
