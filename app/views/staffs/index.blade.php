@extends('main')

@section('content')
	<h1>Staffs</h1>

	@if (Session::has('message'))
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif

	<a class="btn btn-primary" href="/staffs/create">
		Add Staff
	</a>

	<table class="table">
		<thead>
			<th>Name</th>
			<th>Email</th>
			<th></th>
			<th></th>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	
@stop