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
        <input type = "text" name = "titulo" class="form-control" placeholder="Titulo" />
        <input type = "text" name = "descripcion" class="form-control" placeholder="Descripcion" />
        <input type = "submit" value = "Guardar" class="form-control btn btn-primary" />
    </form>

    <hr />

    @if (count($tasks) > 0)
    @foreach ($tasks as $task)
        <div>
            <h3>#{{$task->id}} - {{$task->titulo}} [<a href="viewTask/{{$task->id}}">editar</a>]</h3>
            <p>{{$task->descripcion}}</p>
            <form action="{{url('deleteTask/'.$task->id)}}" method = "POST">

                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-danger">Delete</button>
                <br />
                <hr />
                <br />

            </form>
        </div>
    @endforeach
    @else
        No hay tareas de momento
    @endif
</div>

@endsection