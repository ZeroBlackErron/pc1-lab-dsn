@extends('layout')

@include('menu', ['name' => $user->name])

@section('content')
	<div class="card" style="width: 18rem;">
	  <div class="card-body">
	    <h5 class="card-title">{{ $productDetails->name }}</h5>
	    <p class="card-text">Precio: {{ $productDetails->cost }}  || Stock: {{ $productDetails->stock }}<p>
	    <a href="{{ route('edit.product', $productDetails->id) }}" class="card-link">Actualizar</a>
	    <a href="{{ route('delete.product', $productDetails->id) }}" class="card-link">Eliminar</a>
	  </div>
	</div>
@endsection