@extends('app-salon-admin')
@section('salon-content')
	@include('message')	
	@if(isset($message))
		not worker
	@else
	<div class="container" style="width:89%">
    	<h2>Salon Worker list</h2>
	    <table class="table">
	    <thead>
	      <tr>

	        <th>Worker First name</th>
	        <th>Worker Last name</th>
	        <th>Worker Email</th>
	        <th>Phone Number</th>
	        <th>Worker Profile picture</th>
	        <th>Profession</th>
	        <th>active/Inactive</th>
	        <th>Edit/Delete</th>
	      </tr>
	    </thead>

		@foreach($workers as $worker) 
		    <tbody>
		      	<tr>
			        <td>{{$worker->firstname}}</td>		      
			        <td>{{$worker->lastname}}</td>		      
			        <td>{{$worker->email}}</td>		      
			        <td>{{$worker->phone}}</td>
			        @if($worker->profile_picture)
			        	<td><img style="width: 90px;height: 21px" src="/assets/salon-worker/worker-images/{{$worker->profile_picture}}"></td>      	 
			        @else
			           	<td><img style="width: 90px;height: 21px" src="/assets/salon-worker/worker-images/img1-md.jpg"></td>
			        @endif 
			        <td>{{$worker->profession}}</td> 
			        <td>
			   			@if($worker->activ_inactive == 'active')
				        	<button class="btn btn-success worker_active_botton activ_worker" data-id="{{$worker->id}}">
				        		Active
				        	</button>
			        	@else
			        		<button class="btn btn-danger worker_inactive_button activ_worker" data-id="{{$worker->id}}">
			        			Inactive
			        		</button>
			        	@endif  

			        </td>
			        <td>
			        	<button class="btn btn-primary btn-xs edit_salon_worker_ajax" id="aa" data-title="Edit" alt="{{ csrf_token () }}"  data-toggle="modal" data-target="#edit" data-id="{{$worker->id}}"><i class="fa fa-pencil-square-o"></i></button>
			        	<button data-toggle="modal" class="btn-danger btn-xs delete_salon" data-href="{{action('SalonAdminController@getSalonWorkerDelete' , $worker->id)}}"  data-target="#myModal"><i class="fa fa-times"></i></button>
			        </td>	
		      	</tr>
		    </tbody>			  
		@endforeach
		</table>
	</div>
<center>{!! $workers->render() !!}</center>
{{-- Delete modal --}}
	<div class="container">
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog modal-sm">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Are you sure whant delete  this worker?</h4>
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
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	    <div class="modal-dialog">	
	    	<div class="modal-content">
		      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			        	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			        </button>
			        <h4 class="modal-title custom_align" id="Heading">Edit Salon Worker Detalis</h4>
		      	</div>
		        <div class="modal-body">
		        {!! Form::open(['action' => ['SalonAdminController@postUpdateSalonWorkerDetalis'] ,'class' => 'form-horizontal','files' =>true ]) !!}
		        	<input type="hidden" name="worker_id" class="worker_id">
	         	 	<b>Worker Firstname</b>
	         	 	{!! Form::text('firstname', null, ['class' => 'form-control','id' => 'edit_worker_firstname']) !!}
	         	 	<b>Worker Lastname</b>
	         	 	{!! Form::text('lastname', null, ['class' => 'form-control','id' => 'edit_worker_lastname']) !!}
	         	 	@if(!empty($prof))
				    	<b>Category</b>
				    	{!! Form::select('category_id', $prof, null, array('class' => 'form-control','id' => 'edit_category')) !!}
					@endif
	         	 
	         	 	<b>Worker Email</b>
	         	 	{!! Form::text('email', null, ['class' => 'form-control','id' => 'edit_worker_email']) !!}

	         	 	<b>Worker Phone</b>
	         	 	{!! Form::text('phone', null, ['class' => 'form-control','id' => 'edit_worker_phone']) !!}

	         	 	<b>Worker Profile Picture</b>
	         	 	{!! Form::file('profile_picture', array('id' => 'photo', 'class' => 'profile_picture')) !!}

	         	 	<b>Profession</b>
					{!! Form::text('profession', null, ['class' => 'form-control','id' => 'edit_worker_profession']) !!}
	         	 	<div class="modal-footer ">
	         	 		<div class="col-sm-3"></div>
	         	 		<div class="col-sm-5">
				      		<button type="submit" class="btn btn-warning btn-lg edit_salon_services" style="width: 100%;"  data-href="">
								<span class="glyphicon glyphicon-ok-sign"></span>Update
					        </button>
				    	</div>
				    </div>
			    </div>
				{!! Form::close() !!}    
	        </div>
	  	</div>
	</div>
		
	@endif
{{-- end edit modal --}}
@endsection