<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TareasController extends Controller
{
    public function index()
    {
		$data = [
			'tareas' => ['Tarea 1', 'Tarea 2']
		];
    	return view('tareas/index', $data);
    }
}
