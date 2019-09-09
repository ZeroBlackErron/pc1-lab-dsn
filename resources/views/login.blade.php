@extends('layout')

@section('content')
	<div class="text-center">
		<form class="form-signin" method="post" action="{{ route('session.start') }}">
			@csrf
			<h1 class="h5 mb-3 font-weight-normal">Inicio de sesión</h1>
			<label for="name" class="sr-only">Nombre de usuario</label>
			<input type="text" id="name" name="name" class="form-control" placeholder="Nombre de usuario" required autofocus>
			<label for="password" class="sr-only">Contraseña</label>
			<input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
	    </form>
	</div>
@endsection