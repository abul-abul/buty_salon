@extends('app-salon-admin')
@section('salon-content')
	<div class="container" style="width:89%">
		@include('message')
			<h1>Add Workers job</h1>
	{!! Form::open(['action' => ['SalonAdminController@postAddWorkersJobsImages',$worker_id,$album_id] ,'class' => 'form-horizontal','files' =>true  ]) !!}
	<b>Add Images</b>
	{!! Form::file('images[]', array('multiple'=>true)) !!}
	<div class="modal-footer" style="width:20%">
		<button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"  data-href="">
			  <span class="glyphicon glyphicon-ok-sign"></span>Add
		</button>
	</div>
	{!! Form::close() !!}
		<h1>Album images</h1>
		@foreach($album_images as $album_image)
			<div style="width:200px;height:200px;float:left;margin: 14px 21px 1px 0px;">
				<img style="width:200px;height:150px" src="/assets/salon_images/worker-jobs/{{$album_image->worker_jobs_image}}">
				<button style='width:100%' data-id='{{$album_image->id}}' class='btn btn-danger delete_worker_jobs'>Delete</button>
			</div>
		@endforeach
	</div>	
@endsection