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
		{{ trans('data.add', array('subject' => trans('staff.staff'))) }}
	</a>

	<table class="table">
		<thead>
			<th>{{ trans('staff.username') }}</th>
			<th>{{ trans('staff.name') }}</th>
			<th>{{ trans('staff.email') }}</th>			
			<th></th>
		</thead>
		<tbody>
			@if (count($staffs) > 0)
				@foreach ($staffs as $staff)
			<tr>
				<td>{{ e($staff->username) }}</td>
				<td>{{ e($staff->name) }}</td>
				<td>{{ e($staff->email) }}</td>
				<td style="width: 120px; text-align: right">
					<a class="btn btn-default" title="{{ trans('data.edit') }}" href="">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
					<button class="btn btn-default delete-button" title="{{ trans('data.delete') }}"  data-toggle="modal" href="#delete-confirm" data-id="{{ $staff->id }}">
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
	
@stop