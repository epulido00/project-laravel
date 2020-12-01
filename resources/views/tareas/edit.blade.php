@extends('layouts.app')
@section('content')

<h1>Editar</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (count($errors) > 0) 
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif
<form action="{{url('editTask/'.$task->id)}}" method = "POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
        <input type = "text" name = "titulo" class="form-control" placeholder="Titulo" value = "{{ $task->titulo }}"/>
    </div>
    <div class="form-group">
        <input type = "text" name = "descripcion" class="form-control" placeholder="Descripcion" value = "{{ $task->descripcion }}" />
    </div>
    <input type = "submit" value = "Guardar cambios" class="form-control btn btn-primary" />
</form>

@endsection