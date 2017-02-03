@extends('app-salon-admin')
@section('salon-content')

<div class="container">
    <h2>Registered user list</h2>
    @if(count($notifications)== 0)
	    <h4>Not Registered user </h4>
	@else
	    <table class="table">
		    <thead>
		      <tr>
		      	<th><input type="checkbox"  class="check_all"> Check All</th>
		        <th>User Name</th>
		        <th>Worker Name</th>
		        <th>Service</th>
		        <th>Date</th>
		        <th>Message</th>
		        <th>Status/Delete</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($notifications as $notification) 
		      	<tr>
		      		<th><input class="check" data-id='{{$notification->id}}'  type="checkbox"></th>
			       	<td>{{$notification->user_name}}</td>
			        <td>{{$notification->worker_name}}</td>
			        <td>{{$notification->service_name}}</td>
			        <td>{{$notification->date}}</td>
			        <td style="width: 30%;">{{$notification->message}}</td>
			        <td>
			        	<button><i class="icon-custom icon-sm icon-bg-u fa fa-angellist"></i></button>
			        	<button data-toggle="modal" class="btn-danger btn-xs delete_salon" data-href="{{action('SalonAdminController@getRegisteredNotificationDelete' , $notification->id)}}"  data-target="#myModal"><i class="fa fa-times"></i></button>
	       			</td>	
		      	</tr>
		      	@endforeach
		    </tbody>			  
		</table>
		<p class="check_button"><button content="{{ csrf_token() }}" data-target="#myModal1" data-toggle="modal"  class="btn-danger btn-xs delete_all_notification"   data-target="#myModal"> Delete </button></p>
	@endif
</div>
<center>{!! $notifications->render() !!}</center>
<!-- one delete modal -->
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Are you sure ??</h4>
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
<!-- end one delete -->

<!-- All delete modal -->
<div class="container">
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-sm">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Are you sure ??</h4>
	        </div>      
	        <div class="modal-footer">
	        		<button type="button" data-dismiss="modal" class="btn btn-default all_delete_yes">Yes</button>
	          	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
	        </div>
	      </div>
    </div>
  </div>
</div>
<!-- End All delete -->
@endsection