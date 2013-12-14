@extends('main')

@section('content')
	<h1>Sales</h1>

	@if (Session::has('message'))
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			{{ Session::get('message') }}
		</div>
	@endif

	<a class="btn btn-primary" href="/sales/create">
		{{ trans('data.add', array('subject' => trans('sales.sales'))) }}
	</a>

	<table class="table">
		<thead>
			<th></th>
		</thead>
		<tbody>
			@if (count($sales) > 0)
				@foreach ($sales as $sales_item)
					<tr>
						<td style="width: 120px; text-align: right">
							<a class="btn btn-default" title="{{ trans('data.edit') }}" href="/sales/{{ $sales_item->id }}/edit">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
							<button class="btn btn-default delete-button" title="{{ trans('data.delete') }}" data-toggle="modal" href="#delete-confirm" data-id="{{ $sales_item->id }}">
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
					{{ trans('data.delete_confirmation', array('subject' => trans('sales.sales'))) }}
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
					url: '/sales/' + $(this).attr('data-id'),
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