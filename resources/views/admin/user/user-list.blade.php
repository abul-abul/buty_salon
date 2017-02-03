@extends('app-admin')
@section('content')

	<div class="container">
    <h2>Users list</h2>
    @include('message')
    @if(count($users) == 0)
    <h4> Not users </h4>
    @else
    <table class="table">
	    <thead>
		    <tr>
		        <th>Firstname</th>
		        <th>Lastname</th>
		        <th>Username</th>
		        <th>Phone</th>
		        <th>Profile picture</th>
		        <th>Address</th>
{{-- 		        <th>Active/Inactive</th> --}}
		        <th>Edit/Delete</th>
		    </tr>
	    </thead>
		@foreach($users as $user) 
		    <tbody>
		      <tr>
		      	<td>{{$user->firstname}}</td>
		      	<td>{{$user->lastname}}</td>
		      	<td>{{$user->username}}</td>
		      	<td>{{$user->phone}}</td>
		      	@if(isset($user->profile_picture))
		      		@if($user->facebook_id == null && $user->google_id == null)
		      			<td><img style="width: 67px;height:29px" src="/assets/user/user_images/{{$user->profile_picture}}"></td>
		      		@else
		      			<td><img style="width: 67px;height:29px" src="{{ $user->profile_picture }}"></td>
		      		@endif	
		      	@else
		      		<td><img style="width: 67px;height:29px" src="/assets/user/images/img1-md.jpg"></td>
		      	@endif	
		      	<td>{{$user->address}}</td>
{{-- 		      	<td>
		      		@if($user->active_admin_user == 0)
		      			<button data-id='{{$user->id}}' class="btn btn-danger user_active_admin aa">Inactive</button>
		      		@else
		      			<button data-id='{{$user->id}}' class="btn btn-success user_active_admin aa">Active</button>
		      		@endif
		      	</td> --}}
		      	<td>
		      		<a href="{{action('AdminController@getEditOneUser',$user->id)}}">
		      			<button class="btn btn-primary btn-xs edit_salon_ajax"><i class="fa fa-pencil-square-o"></i></button>
		      		</a>
		        	<button data-toggle="modal" class="btn-danger btn-xs delete_salon" data-href="{{action('AdminController@getDeleteOneUser' , $user->id)}}"  data-target="#myModal"><i class="fa fa-times"></i></button>
		      	</td>
		    </tbody>
		@endforeach
	</table>
	@endif
	{!! $users->render() !!}
</div>
{{-- Delete modal --}}
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Are you sure whant delete  this User??</h4>
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
@endsection