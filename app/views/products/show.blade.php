@extends('main')

@section('content')
	<h1>{{ e($product->name) }}</h1>
	<p>{{ e($product->price) }}</p>

	<div>
		{{ e($product->description) }}
	</div>
@stop