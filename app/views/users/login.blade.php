@extends('master')

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="well">
				<h3>Login</h3>
				<br/>
				{{ Form::open(array('url' => '/login', 'method' => 'post')) }}
					{{ Form::text('username', '', array('class'=>'form-control', 'placeholder'=>'Username')); }}<br>
					{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')); }}<br>
					{{ Form::submit('Login', array('class'=>'btn btn-primary')) }}
				{{ Form::close() }}
			</div>
		</div>
	</div>
@stop