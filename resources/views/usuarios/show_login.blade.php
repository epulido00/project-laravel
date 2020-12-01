@extends('layouts.app')
@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (count($errors) > 0) 
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</div>
@endif

<form action="{{url('login')}}" method="post">
	{{ csrf_field() }}
	<input type="text" name="usuario" placeholder="Usuario" class="form-control"><br />
	<input type="password" name="password" placeholder="Contraseña" class="form-control"><br />
	<input type="submit" value="Login" class="btn btn-primary">
</form>
@endsection