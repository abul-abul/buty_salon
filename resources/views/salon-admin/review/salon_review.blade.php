@extends('app-salon-admin')
@section('salon-content')

<div class="container">
    <h2> Feedbacks list</h2>
    @if(count($salon_reviews)== 0)
	    <h4>Not Feedbacks </h4>
	@else
	    <table class="table">
		    <thead>
		      <tr>
		      	<th><input type="checkbox"  class="check_all"> Check All</th>
		        <th>User Name</th>
		        <th>Review</th>
		        <th>Delete</th>
		      </tr>
		    </thead>
		    <tbody>
		    	@foreach($salon_reviews as $salon_review) 
		      	<tr>
		      		<th><input class="check" data-id='{{$salon_review->id}}'  type="checkbox"></th>
			       	<td>{{$salon_review->user_name}}</td>
			        <td>{{$salon_review->message}}</td>
			        <td>
			        	<button data-toggle="modal" class="btn-danger btn-xs delete_salon" data-href="{{action('SalonAdminController@getSalonReviewDelete' , $salon_review->id)}}"  data-target="#myModal"><i class="fa fa-times"></i></button>
	       			</td>	
		      	</tr>
		      	@endforeach
		    </tbody>			  
		</table>
		<p class="check_review_button"><button content="{{ csrf_token() }}" data-target="#myModal1" data-toggle="modal"  class="btn-danger btn-xs delete_all_salons"> Delete </button></p>
	@endif
</div>
<center></center>
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
	        		<button type="button"  class="btn btn-default">Yes</button>
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
	        	<button type="button" data-dismiss="modal"  class="btn btn-default all_review_salon_delete_yes">Yes</button>
	          	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
	        </div>
	      </div>
    </div>
  </div>
</div>
<!-- End All delete -->
@endsection