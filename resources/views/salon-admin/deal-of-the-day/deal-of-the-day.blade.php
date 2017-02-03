@extends('app-salon-admin')
@section('salon-content')
	@include('message')
<div style="width:40%;margin-left:20%">
	@if(empty($deal_of_the_day))
	<h1>Add Deal Of The Day</h1>
		{!! Form::open(['action' => ['SalonAdminController@postAddDealOfTheDay'] ,'class' => 'form-horizontal','files' =>true  ]) !!}
		<b>Description</b>
		{!! Form::textarea('description', null, ['id' => 'deal_description' ,'placeholder' => 'Description', 'class' => 'form-control']) !!}<br>
		
		<div class="modal-footer ">
			<div class="col-md-3"></div>
	        <div class="col-md-5">
				<button type="submit" class="btn btn-warning btn-lg edit_salon_admin" style="width: 100%;"  data-href="">
					  <span class="glyphicon glyphicon-ok-sign"></span>Add
				</button>
			</div>
		</div>
		{!! Form::close() !!}
	@endif 
</div>

    @if(!empty($deal_of_the_day))
    	<table class="table">
		    <thead>
		      <tr>
		        <th>description</th>
		        <th>Edit/Delete</th>
		      </tr>
		    </thead>
		    <tbody>
		      	<tr>
			        <td>{{$deal_of_the_day->description}}</td>
			        <td>
			        	<button class="btn btn-primary btn-xs" data-title="Edit" alt="{{ csrf_token () }}"  data-toggle="modal" data-target="#edit"><i class="fa fa-pencil-square-o"></i></button>
			        	<button data-toggle="modal" class="btn-danger btn-xs delete_salon" data-href="{{action('SalonAdminController@getDealOfTheDayDelete' , $deal_of_the_day->id)}}"  data-target="#myModal"><i class="fa fa-times"></i></button>
			        </td>	
		      	</tr>
		    </tbody>			  
		</table>
		@endif



{{-- Delete modal --}}
<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Are you sure whant delete??</h4>
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

{{-- end delete modal --}}
 @if(!empty($deal_of_the_day))
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
	    <div class="modal-dialog">	
	    	<div class="modal-content">
		      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			        	<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
			        </button>
			        <h4 class="modal-title custom_align" id="Heading">Edit Detalis</h4>
		      	</div>
		        <div class="modal-body">
		        {!! Form::model($deal_of_the_day, ['action' => ['SalonAdminController@postEditDealOfTheDay',$deal_of_the_day->id] ,'class' => 'form-horizontal','files' =>true ]) !!}
	         	 	<b>Description</b>
	         	 	{!! Form::textarea('description', null, ['id' => 'deal_description' ,'placeholder' => 'Description', 'class' => 'form-control']) !!}<br>
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
@section('scripts')
{!! HTML::script( asset('assets/user/plugins/js/jquery.min.js') ) !!} 
@endsection
	{!! HTML::script(asset('assets/admin/plugins/js/tinymce/tinymce.min.js')) !!}
	<script type="text/javascript">
	    tinymce.init({
	        selector: "#deal_description"
	    });
	</script>
@endsection

