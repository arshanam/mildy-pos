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
				<td>{{ $staff->username }}</td>
				<td>{{ $staff->name }}</td>
				<td>{{ $staff->email }}</td>
			</tr>
				@endforeach
			@else
			<tr>
				<td></td>
			</tr>
			@endif
		</tbody>
	</table>
	
@stop