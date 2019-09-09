@extends('layout')

@include('menu', ['name' => $user->name])

@section('content')
	<h1>Nuevo producto</h1>
	<form action="{{ route('store.product') }}" method="post">
		@csrf
		<div class="form-group">
		    <label for="name">Nombre</label>
		    <input type="text" class="form-control" id="name" name="name">
		</div>
		<div class="form-group">
		    <label for="cost">Precio</label>
		    <input type="text" class="form-control" id="cost" name="cost">
		</div>
		<div class="form-group">
		    <label for="id_category">Categoria</label>
		    <input type="text" class="form-control" id="id_category" name="id_category">
		</div>
		<div class="form-group">
		    <label for="stock">Stock</label>
		    <input type="text" class="form-control" id="stock" name="stock">
		</div>
		<button type="submit" class="btn btn-success">Crear</button>
	</form>
@endsection