@extends('app-salon-admin')
@section('salon-content')
	<h1>Add Salon Images</h1>
	@include('message')
	{!! Form::open(['action' => ['SalonAdminController@postAddImage'] ,'class' => 'form-horizontal','files' =>true  ]) !!}
     	
     	{!! Form::file('image_name[]', array('multiple'=>true)) !!}

  		<button type="submit" style="margin-top:10px" class="btn btn-warning">
			<span class="glyphicon glyphicon-ok-sign"></span>Add
        </button>

	{!! Form::close() !!} 
@endsection