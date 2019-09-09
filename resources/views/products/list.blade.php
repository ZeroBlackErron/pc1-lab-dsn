@extends('layout')

@include('menu', ['name' => $user->name])

@section('content')
	<h1>Lista de productos</h1>
	<table class="table text-center">
	  <thead>
	    <tr>
	      <th scope="col">Código</th>
	      <th scope="col">Nombre</th>
	      <th colspan="2">Acciones</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach ($products as $product)
	  	<tr>
	      <th>{{ $product->id }}</th>
	      <td>{{ $product->name }}</td>
	      <td><a href="{{ route('edit.product', $product->id) }}">Actualizar</a></td>
	      <td><a href="{{ route('delete.product', $product->id) }}">Eliminar</a></td>
	    </tr>
		@endforeach
	  </tbody>
	</table>
@endsection