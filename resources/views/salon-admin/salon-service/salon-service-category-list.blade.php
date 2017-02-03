@extends('app-salon-admin')
@section('salon-content')
<div class="col-sm-8 col-md-8">
	<center><h1>Category List</h1></center>
	</div>

<div class="container" style="width:89%">
	@if(count($categorys) == 0)
	<h4>Not Category </h4>
	@else
	    <table class="table">
	    <thead>
	      <tr>
	        <th>Category Name</th>
	        <th>Edit/Delete</th>
	      </tr>
	    </thead>
		@foreach($categorys as $category)
		    <tbody>
		     	<tr >
		     		<td>
		     			<a href="{{action('SalonAdminController@getSalonCatService',$category->id)}}"> {{$category->category}}</a>
		     		</td>
			        <td>
						<button class="btn btn-primary btn-xs edit_salon_category_ajax" data-title="Edit" alt="{{ csrf_token () }}"  data-toggle="modal" data-target="#edit" data-id="{{$category->id}}"><i class="fa fa-pencil-square-o"></i></button>
			   			<button data-toggle="modal" class="btn-danger btn-xs delete_salon" data-href="{{action('SalonAdminController@getSalonCategoryDelete' , $category->id)}}"  data-target="#myModal"><i class="fa fa-times"></i></button>
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
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	    <div class="modal-dialog">	
	    	<div class="modal-content">
		      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			        	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			        </button>
			        <h4 class="modal-title custom_align" id="Heading">Edit Salon Category Detalis</h4>
		      	</div>
		        <div class="modal-body">
		        	{!! Form::open(['action' => ['SalonAdminController@postUpdateSalonCategory'] ,'class' => 'form-horizontal','files' =>true ]) !!}
		        	<input type="hidden" name="category_id" class="category_id">
	         	 	<b>Category Name</b>
	         	 	{!! Form::text('category', null, ['class' => 'form-control','id'=>'edit_category']) !!}
         	 		<div class="modal-footer">
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
{{-- end edit modal --}}
@endsection