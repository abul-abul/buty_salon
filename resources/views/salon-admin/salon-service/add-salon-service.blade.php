@extends('app-salon-admin')
@section('salon-content')
	@include('message')
	<div style="width:40%;margin-left:20%">
		<h1>Add Salon Services</h1><br>
		{!! Form::open(['action' => ['SalonAdminController@postAddSalonServices'] ,'class' => 'form-horizontal','files' =>true ] ) !!}
			<div class="col-sm-12">
				<b>Select Category</b>
				<select class="form-control" name="salon-category-id">
					@foreach($categorys as $category)
						<option value="{{$category->id}}">{{$category->category}}</option>
					@endforeach
				</select>
			 	<br><b>Services</b>
		      	{!! Form::text('services', null, ['placeholder' => 'Services', 'class' => 'form-control']) !!}
	  		</div>
	  		<div class="col-sm-12">
	  			<br>
	  			<div class="col-sm-2">
	     			<b>Service Prices</b>
	     		</div><br>
		     	<div class="col-sm-5">
		     		{!! Form::text('service_prices_min',null, ['placeholder' => 'Service Prices Min', 'class' => 'form-control']) !!}
		     	</div>
		     	<div class="col-sm-5">
		     		{!! Form::text('service_prices_max',null, ['placeholder' => 'Service Prices Max', 'class' => 'form-control']) !!}
		    	</div>
	        </div>
		    <div class="col-sm-12"><br>
		   		<b>Discount</b>
		     	{!! Form::text('discount', null,['placeholder' => 'Discount', 'class' => 'form-control']) !!}<br>
		    </div>
	 	 	<div class="modal-footer ">
	 	 		<div class="col-md-3"></div>
	        	<div class="col-md-5">
		      		<button type="submit" class="btn btn-warning btn-lg edit_salon_admin" style="width: 100%;"  data-href="">
						<span class="glyphicon glyphicon-ok-sign"></span>Add Service
			        </button>
			    </div>
			</div>

		{!! Form::close() !!} 
	<div>
@endsection