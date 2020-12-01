<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Task;

class TareasController extends Controller
{
    public function index()
    {

    	$tasks = Task::orderBy('created_at', 'asc')->get();
    	
	    return view('inicio.principal', [
	        'tasks' => $tasks
	    ]);
    }

    public function addTask(Request $request)
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
	    $task->titulo = $request->input('titulo');
	    $task->descripcion = $request->input('descripcion');
	    $task->confirmed = false;

	    $task->save();

	    return redirect('/');
	}
	
	public function deleteTask(Task $task) {
		$task->delete();

		return redirect('/');
	}
}
