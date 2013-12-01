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
		{{ Form::text('username', Input::old('username'), array('class'=>'form-control')); }}<br>
		@if ($errors->has('username'))
			<span class="help-block">{{ $errors->first('username') }}</span>
		@endif

		{{ Form::label('password', 'Password') }}
		{{ Form::password('password', array('class'=>'form-control')); }}<br>
		@if ($errors->has('password'))
			<span class="help-block">{{ $errors->first('password') }}</span>
		@endif

		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Input::old('name'), array('class'=>'form-control')); }}<br>
		@if ($errors->has('name'))
			<span class="help-block">{{ $errors->first('name') }}</span>
		@endif

		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', Input::old('email'), array('class'=>'form-control')); }}<br>
		@if ($errors->has('email'))
			<span class="help-block">{{ $errors->first('email') }}</span>
		@endif

		{{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
		<a href="/staffs" class="btn btn-default">Cancel</a>
	{{ Form::close() }}
	
@stop