@extends('layouts.app')
@section('content')


<div>
    <h4>Pendientes por hacer</h4>
    @if (count($errors) > 0) 
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    <form action="{{url('addTask')}}" method = "POST">
        {{ csrf_field() }}
        <input type = "text" name = "titulo" />
        <input type = "text" name = "descripcion" />
        <input type = "submit" value = "Guardar" />
    </form>

    @if (count($tasks) > 0)
    @foreach ($tasks as $task)
        <div>
            <h3>{{$task->titulo}}</h3>
            <p>{{$task->descripcion}}</p>
        </div>
    @endforeach
    @else
        No hay tareas de momento
    @endif
</div>

@endsection