@extends('main')

@section('content')
	<h1>{{ e($staff->name) }}</h1>
	<p>{{ e($staff->username) }}</p>

	<div>
		{{ e($staff->email) }}
	</div>
@stop