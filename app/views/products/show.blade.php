@extends('main')

@section('content')
	<h1>{{ $product->name }}</h1>
	<p>{{ $product->price }}</p>

	<div>
		{{ $product->description }}
	</div>
@stop