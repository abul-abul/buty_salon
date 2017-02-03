@extends('app-salon-admin')
@section('salon-content')
@if(count($images) != 0)
	<h1>Images List</h1>
	<div class="row">
	@foreach($images as $image)
		<div class="woker_job_blocks">
			<img class="jobs_img" src="/assets/salon_images/salon-images/{{$image->image_name}}"><br>
			<button data-toggle="modal" class="btn-danger btn-xs delete_salon" data-href="{{action('SalonAdminController@getSalonImageDelete' , $image['id'])}}"  data-target="#myModal"><i class="fa fa-times"></i></button>
		</div>
	@endforeach
	</div> 
@else
<h2>Not images</h2>
@endif
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
	{{-- End Delete modal --}}
@endsection