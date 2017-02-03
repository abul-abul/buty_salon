@extends('app-salon-admin')
@section('salon-content')

<div class="container">
    <h2>Salon Services  list</h2>
    @if(count($services) == 0)
    	<h3>Not Services </h3>
    @else
	    <table class="table">
		    <thead>
		      <tr>
		        <th>Service name</th>
		        <th>Service price min</th>
		        <th>Service price max</th>
		        <th>New price(discount)</th>
		        <!-- <th>Add Workers jobs</th> -->
		        <th>Edit/Delete</th>
		      </tr>
		    </thead>
			@foreach($services as $service)
				    <tbody>
				      	<tr>
					        <td>{{$service->services}}</td>		      
					        <td>{{$service->service_prices_min}}</td>
					        <td>{{$service->service_prices_max}}</td>
					        @if($service->discount != "")
					        <td>{{$service->discount}}</td>
					        @else
					        <td>-</td>
					        @endif
<!-- 					        <td>
					        	<a href="{{action('SalonAdminController@getAddWorkersJobs',$category_id)}}">Add Workers job</a>
					        </td> -->	
					        <td>
					        <a href="{{action('SalonAdminController@getEditSalonService',$service->id)}}">
					        	<button class="btn btn-primary btn-xs edit_salon_service_ajax" data-title="Edit" alt="{{ csrf_token () }}"  data-toggle="modal" data-target="#edit" data-id="{{$service->id}}"><i class="fa fa-pencil-square-o"></i></button>
					        </a>	
					        	<button data-toggle="modal" class="btn-danger btn-xs delete_salon" data-href="{{action('SalonAdminController@getSalonServiceDelete' , $service->id)}}"  data-target="#myModal"><i class="fa fa-times"></i></button>
					        </td>	
				      	</tr>
				    </tbody>			  
			@endforeach
		</table>
		@endif
</div>

{{-- Delete modal --}}
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Are you sure whant delete  this file??</h4>
	        </div>      
	        <div class="modal-footer">
	        	<a class="delete_salon_yes" href="">
	        		<button type="button"  class="btn btn-default ">Yes</button>
	        	</a>
	          	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
	        </div>
	      </div>
    </div>
  </div>
</div>
{{-- end delete modal --}}

{{-- Edit modal --}}
{{-- 	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">

	    <div class="modal-dialog">
	
	    	<div class="modal-content">
		      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			        	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			        </button>
			        <h4 class="modal-title custom_align" id="Heading">Edit Salon Category Service</h4>			      
		      	</div>
		        <div class="modal-body">

	         	 	<b>Services</b>
	         	 	{!! Form::text('services', null, ['class' => 'form-control','id'=>'edit_salon_services']) !!}
	         	 	<b>Salon Services prices min</b>
	         	 	{!! Form::text('service_prices_min', null, ['class' => 'form-control','id' => 'edit_salon_services_price_min']) !!}

	         	 	<b>Salon Services prices max</b>
	         	 	{!! Form::text('service_prices_max', null, ['class' => 'form-control','id' => 'edit_salon_services_price_max']) !!}
	         	 	<b>Salon discount</b>
	         	 	{!! Form::text('discount', null, ['class' => 'form-control','id' => 'edit_salon_services_discount']) !!}

	         	 	<b>Service Image</b>
	         	 	{!! Form::file('service_images', null, ['class' => 'form-control','id' => 'edit_salon_service']) !!}
	         	 	<div class="modal-footer ">
			      		<button type="button" class="btn btn-warning btn-lg edit_salon_services" style="width: 100%;" >
							<span class="glyphicon glyphicon-ok-sign"></span>Update
				        </button>
				    </div>

			    </div>		      
	        </div>
	  	</div>
	</div> --}}
{{-- end edit modal --}}
@endsection