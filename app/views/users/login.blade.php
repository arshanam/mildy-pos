@extends('master')

@section('content')
	 <div class="row">
 	<div class="span offset4">
 		<div class="well">
	{{ Form::open(array('url' => '')) }}
    {{ Form::text('username', '', array('class'=>'form-control', 'placeholder'=>'Username')); }}<br>
    {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')); }}<br>
    {{ Form::submit('Login', array('class'=>'btn btn-primary')) }}
	{{ Form::close() }}
	</div></div></div>
@stop