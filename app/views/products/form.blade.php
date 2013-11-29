@extends('main')

@section('content')
	<legend>
		@if (!isset($product))
			{{ trans('data.add', array('subject' => trans('product.product'))) }}
		@else
			{{ trans('data.edit_subject', array('subject' => trans('product.product'))) }}
		@endif
	</legend>

	{{ !isset($product) ? Form::open(array('url' => '/products', 'method' => 'post')) : Form::open(array('url' => '/products/' . $product->id, 'method' => 'put')) }}
		<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
			{{ Form::label('name', 'Name') }}
			{{ Form::text('name', isset($product) ? $product->name : Input::old('name'), array('class' => 'form-control')) }}
			@if ($errors->has('name'))
				<span class="help-block">{{ $errors->first('name') }}</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
			{{ Form::label('price') }}
			{{ Form::text('price', isset($product) ? $product->price : Input::old('price'), array('class' => 'form-control')) }}
			@if ($errors->has('price'))
				<span class="help-block">{{ $errors->first('price') }}</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
			{{ Form::label('description') }}
			{{ Form::textarea('description', isset($product) ? $product->description : Input::old('description'), array('class' => 'form-control')) }}
		</div>

		<button type="submit" class="btn btn-primary">Save</button>
		<a href="/products" class="btn btn-default">Cancel</a>
	{{ Form::close() }}
@stop