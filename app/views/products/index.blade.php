@extends('main')

@section('content')
	<h1>Products</h1>

	@if (Session::has('message'))
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif

	<a class="btn btn-primary" href="/products/create">
		{{ trans('data.add', array('subject' => trans('product.product'))) }}
	</a>

	<table class="table">
		<thead>
			<th>{{ trans('product.name') }}</th>
			<th>{{ trans('product.price') }}</th>
			<th>{{ trans('product.description') }}</th>
			<th>eaa</th>
		</thead>
		<tbody>
			@if (count($products) > 0)
				@foreach ($products as $product)
					<tr>
						<td><a href="/products/{{ $product->id }}">{{ e($product->name) }}</a></td>
						<td>{{ e($product->price) }}</td>
						<td>{{ e($product->description) }}</td>
						<td style="width: 120px; text-align: right">
							<a class="btn btn-default" title="{{ trans('data.edit') }}" href="/products/{{ $product->id }}/edit">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
							<button class="btn btn-default delete-button" title="{{ trans('data.delete') }}" data-toggle="modal" href="#delete-confirm" data-id="{{ $product->id }}">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
						</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan="3">{{ trans('data.no_data') }}</td>
				</tr>
			@endif
		</tbody>
	</table>

	<div id="delete-confirm" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					Delete Confirmation
				</div>

				<div class="modal-body">
					{{ trans('data.delete_confirmation', array('subject' => trans('product.product'))) }}
				</div>

				<div class="modal-footer">
					<button id="confirm-delete" class="btn btn-danger">{{ trans('data.delete') }}</button>
					<button class="btn btn-default" data-dismiss="modal">{{ trans('data.cancel') }}</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$('.delete-button').click(function(e) {
				$('#confirm-delete').attr('data-id', $(this).attr('data-id'));
			});

			$('#confirm-delete').click(function(e) {
				$.ajax({
					url: '/products/' + $(this).attr('data-id'),
					type: 'DELETE',
					success: function(result) {
						console.log('transitioning')
						location.reload();
					}
				});
			});
		});
	</script>
@stop