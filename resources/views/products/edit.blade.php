@extends('layout')

@include('menu', ['name' => $user->name])

@section('content')
	<h1>Actualizar producto</h1>
	<form action="{{ route('update.product', $product->id) }}" method="post">
		@csrf
		<div class="form-group">
		    <label for="name">Nombre</label>
		    <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
		</div>
		<div class="form-group">
		    <label for="cost">Precio</label>
		    <input type="text" class="form-control" id="cost" name="cost" value="{{ $product->cost }}">
		</div>
		<div class="form-group">
		    <label for="id_category">Categoria</label>
		    <input type="text" class="form-control" id="id_category" name="id_category" value="{{ $product->id_category }}">
		</div>
		<div class="form-group">
		    <label for="stock">Stock</label>
		    <input type="text" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
		</div>
		<button type="submit" class="btn btn-success">Actualizar</button>
	</form>
@endsection