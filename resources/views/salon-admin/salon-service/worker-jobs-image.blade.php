@extends('app-salon-admin')
@section('salon-content')
@include('message')
<div style="width:40%;margin-left:20%">	
		<h1>Add Workers job</h1>
		{!! Form::open(['action' => ['SalonAdminController@postAddWorkersJobs'] ,'class' => 'form-horizontal','files' =>true  ]) !!}
			<b>Select Worker</b>
			<select name="worker_id" class="form-control workers_jobs_in_albom">
				<option selected  disabled>Select Worker</option>
				@foreach($workers as $key=>$worker)
					<option value="{{$worker->id}}">{{$worker->firstname}}</option>
				@endforeach
			</select>
			<br><b>Worker Albom</b>
			<select name="album_id" class="form-control worker_albom"></select><br>
			<b>Images</b>
			<input type="hidden" name="category_id" value="{{$category_id}}">
			{!! Form::file('images[]', array('multiple'=>true)) !!}<br>

			<div class="modal-footer ">
				<div class="col-md-3"></div>
	        	<div class="col-md-5">
					<button type="submit" class="btn btn-warning btn-lg edit_salon_admin" style="width: 100%;"  data-href="">
						  <span class="glyphicon glyphicon-ok-sign"></span>Add
					</button>
				</div>
			</div>

		{!! Form::close() !!}

    <br><br>
    <h1>Filter Workers jobs</h1>
	<div>
		<input type="hidden" value="{{ csrf_token() }}" class="worker_token">
		<select data-salonid="{{Auth::id()}}" data-catid="{{$category_id}}" name="worker_id" class="form-control filter_worker_jobs">
			<option selected  disabled>Select Worker</option>
			@foreach($workers as $key=>$worker)
				<option value="{{$worker->id}}">{{$worker->firstname}}</option>
			@endforeach
		</select>
		<div class="worker_block" style="width: 217px;margin:15px auto">
			
		</div>
		<div class="workers_jobs_block" style="display:table">
			
		</div>
	</div>
</div>

@endsection

<!--  delete modal -->
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
	        	<button type="button"   class="btn btn-default delete_salon_yes">Yes</button>
	        </a>	
	          	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
	        </div>
	      </div>
    </div>
  </div>
</div>
<!-- End  delete -->