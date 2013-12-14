@extends('main')

@section('content')
	<legend>
		@if(!isset($staff))
			{{ trans('data.add', array('subject' => trans('staff.staff'))) }}
		@else
			{{ trans('data.edit_subject', array('subject' => trans('staff.staff'))) }}
		@endif		
	</legend>

	{{ !isset($staff) ? Form::open(array('url' => '/staffs', 'method' => 'post')) : Form::open(array('url' => '/staffs/' . $staff->id, 'method' => 'put')) }}
		<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
			{{ Form::label('username', 'Username') }}
			{{ Form::text('username', isset($staff) ? $staff->username : Input::old('username'), array('class'=>'form-control')); }}
			@if ($errors->has('username'))
				<span class="help-block">{{ $errors->first('username') }}</span>
			@endif
		</div>

		@if(!isset($staff))
			<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', array('class'=>'form-control')); }}
				@if ($errors->has('password'))
					<span class="help-block">{{ $errors->first('password') }}</span>
				@endif
			</div>
		@endif
		
		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', isset($staff) ? $staff->name : Input::old('name'), array('class'=>'form-control')); }}
			@if ($errors->has('name'))
				<span class="help-block">{{ $errors->first('name') }}</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
			{{ Form::label('email', 'Email') }}
			{{ Form::email('email', isset($staff) ? $staff->email : Input::old('email'), array('class'=>'form-control')); }}
			@if ($errors->has('email'))
				<span class="help-block">{{ $errors->first('email') }}</span>
			@endif
		</div>

		{{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
		<a href="/staffs" class="btn btn-default">Cancel</a>
	{{ Form::close() }}
	
@stop