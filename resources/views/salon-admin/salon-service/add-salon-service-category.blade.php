@extends('app-salon-admin')
@section('salon-content')
	<h1>Add Salon Services Category</h1>
	@include('message')
	<div class="modal-body">
		<div class="col-md-3 ">
		{!! Form::open(['action' => ['SalonAdminController@postAddSalonServicesCategory'] ,'class' => 'form-horizontal','files' =>true ]) !!}
			<b>Category Name</b>
			{!! Form::text('category', null, ['placeholder' => 'Enter Category Name', 'class' => 'form-control']) !!}
			<br>
			<button class="btn btn-info" type="submit">Add</button>
		{!! Form::close() !!}
		</div>
	</div>
@endsection