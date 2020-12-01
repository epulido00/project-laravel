<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function index()
    {
    	/*
		$data = [
			'tareas' => ['Tarea 1', 'Tarea 2']
		];
    	return view('tareas/index', $data);*/

    	$tasks = Task::orderBy('created_at', 'asc')->get();
    	
	    return view('inicio.principal', [
	        'tasks' => $tasks
	    ]);
    }

    public function addTask()
    {
    	$request = request();
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
    }
}
