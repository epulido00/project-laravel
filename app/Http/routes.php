<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;
use App\Task;

Route::get('/tareas', 'TareasController@index');

Route::get('/tareas2', function () {

    return 'Hola';
});

Route::get('/', function () {

    $tasks = Task::orderBy('created_at', 'asc')->get();
    
    return view('inicio.principal', [
        'tasks' => $tasks
    ]);
});

Route::post('addTask', function(Request $request) {
    $validator = Validator::make($request->all(), [
        'titulo' => 'required|max:255',
        'descripcion' => 'required'
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    
    $task = new Task;
    $task->titulo = $request->titulo;
    $task->descripcion = $request->descripcion;
    $task->confirmed = false;

    $task->save();

    return redirect('/');
});