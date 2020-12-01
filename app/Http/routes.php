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

Route::get('/tareas', 'TareasController@index');

Route::get('/', 'TareasController@index');

Route::post('/addTask', 'TareasController@addTask');

Route::delete('/deleteTask/{task}', 'TareasController@deleteTask');

Route::get('/viewTask/{id}', 'TareasController@viewTask');

Route::put('/editTask/{task}', 'TareasController@editTask');