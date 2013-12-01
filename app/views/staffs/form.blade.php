@extends('main')

@section('content')
	<legend>
		Add Staff
	</legend>

	@if (Session::has('message'))
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif

	{{ Form::open(array('url' => '/staffs', 'method' => 'post')) }}
		{{ Form::label('username', 'Username') }}
		{{ Form::text('username', '', array('class'=>'form-control')); }}<br>
		{{ Form::label('password', 'Password') }}
		{{ Form::password('password', array('class'=>'form-control')); }}<br>
		{{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
		<a href="/staffs" class="btn btn-default">Cancel</a>
	{{ Form::close() }}
	
@stop