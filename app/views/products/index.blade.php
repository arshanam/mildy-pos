@extends('main')

@section('content')
	<h1>Products</h1>

	<a class="btn btn-primary" href="/products/create">
		{{ trans('data.add', array('subject' => 'Product')) }}
	</a>

	<table class="table">
		<thead>
			<th>{{ trans('product.name') }}</th>
			<th>{{ trans('product.price') }}</th>
			<th>{{ trans('product.description') }}</th>
		</thead>
		<tbody>
			@if (count($products) > 0)
				@foreach ($products as $product)
					<tr>
						<td>{{ $product->name }}</td>
						<td>{{ $product->price }}</td>
						<td>{{ $product->description }}</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan="3">{{ trans('data.no_data') }}</td>
				</tr>
			@endif
		</tbody>
	</table>
@stop