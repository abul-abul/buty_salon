@extends('app-salon-admin')
@section('salon-content')

<div class="container">
    <h2>New Notifications  list</h2>
    @if(count($new_notifications)== 0)
	    <h4>Not New Notifications </h4>
	@else
	    <table class="table">
		    <thead>
		      <tr>
		        <th>User Name</th>
		        <th>Worker Name</th>
		        <th>Service</th>
		        <th>Date</th>
		        <th>Message</th>
		        <th>Yes/No</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($new_notifications as $new_notification) 
		      	<tr>
			       	<td>{{$new_notification->user_name}}</td>
			        <td>{{$new_notification->worker_name}}</td>
			        <td>{{$new_notification->service_name}}</td>
			        <td>{{$new_notification->date}}</td>
			        <td style="width: 30%;">{{$new_notification->message}}</td>
			        <td>
			        	<button data-toggle="modal" class="btn btn-primary btn-xs delete_salon" data-href="{{action('SalonAdminController@getNotificationYes' , $new_notification->id)}}"  data-target="#myModal"><i class="fa fa-thumbs-up"></i></button>
			        	<button data-toggle="modal" class="btn-danger btn-xs delete_salon" data-href="{{action('SalonAdminController@getNotificationDelete' , $new_notification->id)}}"  data-target="#myModal"><i class="fa fa-times"></i></button>
			        </td>	
		      	</tr>
		      	@endforeach
		    </tbody>			  
		</table>
	@endif	
</div>
<center>{!! $new_notifications->render() !!}</center>
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
@endsection