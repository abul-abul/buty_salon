@extends('app-salon-admin')
@section('salon-content')
<div class="col-sm-3"></div>
<div class="col-sm-5">
	<h1>Edit Service detalis</h1>
	@include('message')
	{!! Form::model($salonservices,['action' => ['SalonAdminController@postUpdateService',$salonservices->id] ,'class' => 'form-horizontal','files' =>true ] ) !!}
	 	<b>Services</b>
	 	{!! Form::text('services', null, ['class' => 'form-control','id'=>'edit_salon_services']) !!}<br>
	 	<b>Salon Services prices min</b>
	 	{!! Form::text('service_prices_min', null, ['class' => 'form-control','id' => 'edit_salon_services_price_min']) !!}<br>
	 	<b>Salon Services prices max</b>
	 	{!! Form::text('service_prices_max', null, ['class' => 'form-control','id' => 'edit_salon_services_price_max']) !!}<br>
	 	<b>Salon discount</b>
	 	{!! Form::text('discount', null, ['class' => 'form-control','id' => 'edit_salon_services_discount']) !!}<br>
	 	<b>Service Image</b>
	 	{!! Form::file('service_images', null, ['class' => 'form-control','id' => 'edit_salon_service']) !!}<br>
	 	<div class="modal-footer ">
	 		<div class="col-md-3"></div>
	        <div class="col-md-5">
				<button type="submit" class="btn btn-warning btn-lg edit_salon_services" style="width: 100%;" >
					<span class="glyphicon glyphicon-ok-sign"></span>Update
		    	</button>
		    </div>
		</div>
	{!! Form::close() !!} 
</div>	
@endsection