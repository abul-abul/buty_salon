@extends('app-admin')
@section('content')
@include('message')
@if(count($subscribe_users)!= '')
  	<h1>Send Email Subscribed Users</h1>
  	<div class="col-md-5">
  		<div id="message_salon"></div>
  		<input type="hidden" id="token" data="{{ csrf_token() }}">
		<textarea name="message_text" placeholder="Enter Message" rows="5" class ="form-control text_email"></textarea>
	</div>
	<button style="margin-top:30px;width:100px;height:50px;" content="{{ csrf_token() }}"  class="btn-success btn-xs senc_email_salons"> Send email checked users </button>
	<table class="table table-sm">
  		<thead>
			<tr>
				<th><input type="checkbox"  class="check_all_users_salon"> Check All </th>
			  	<th>Mail</th>
			  	<th>Delete</th>
			</tr>
  		</thead>
	  	<tbody>
		  	@foreach($subscribe_users as $subscribe)
			<tr>
				<td><input class="check_user_salon" data-id='{{$subscribe->email}}'  type="checkbox"></td>
			  	<td>{{$subscribe->email}}</td>
			  	<td>
					<button data-toggle="modal" class="btn btn-danger delete_article" data-href="{{action('AdminController@getDeleteSubscribe',$subscribe->id)}}" data-target="#myModal">
					  	<i class="glyphicon glyphicon-trash"></i>
					</button>
			  	</td>
			</tr> 
			@endforeach
	  	</tbody>
	</table>
  	<!-- delete Modal -->
  	<div class="modal fade" id="myModal" role="dialog">
	  	<div class="modal-dialog">
		  	<div class="modal-content">
				<div class="modal-body">
				  	<p>Are you sure delete?</p>
				</div>
				<div class="modal-footer">
				  	<a href="#" class="delete_article_yes">
						<button type="button" data-href="" class="btn btn-default">Yes</button>
				  	</a>
					<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
				</div>
		  	</div>
	  </div>
  	</div>
	<!--end Modal -->
@else
  not subscribed users
@endif

@endsection