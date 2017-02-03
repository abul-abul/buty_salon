@extends('app-salon-admin')
@section('salon-content')
@include('message')
	<div class="container" style="width:89%">
		<h2>Salon Worker Album list</h2>
		@foreach($alboms as $albom) 
			<div class="albom_cols">
				@if($albom->album_prof_pic)	
					<img data-id="{{$albom->id}}" class="albom_img" data-toggle="modal" data-target="#imgModal" style="cursor:pointer" src="/assets/salon-worker/album-profile-pictures/{{$albom->album_prof_pic}}"><br>
				@else
					<img data-id="{{$albom->id}}" class="albom_img" data-toggle="modal" data-target="#imgModal" style="cursor:pointer" src="/assets/salon-worker/album-profile-pictures/img1-md.jpg"><br>
				@endif
				<a href="{{action('SalonAdminController@getAlbumImages',$albom->id)}}">
					<span>{{$albom->album_name}}</span>
				</a>
				<div style="width: 100px">
					<input style="display:none;float:left;border: 1px solid #4CAF50;" class="edit_worker_albom_name_input" type="text" value="{{$albom->album_name}}">
					<button style="float:left" class="btn btn-info edit_worker_albom_name">
						<i class="glyphicon glyphicon-pencil"></i>
					</button>
					<button style="display:none;float:left" data-id="{{$albom['id']}}" class="btn btn-success success_albom">
						<i class="glyphicon glyphicon-ok"></i>
					</button>
					<button data-toggle="modal" class="btn btn-danger delete_salon" data-href="{{action('SalonAdminController@getAlbumDelete' , $albom['id'])}}"  data-target="#myModal"><i class="glyphicon glyphicon-trash"></i></button>
				</div>		  
			</div>
		@endforeach
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

	{{-- edit img modal --}}
		<div class="container">
		<div class="modal fade" id="imgModal" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Edit Albom Image</h4>
					</div>      
					<div class="modal-footer">
						  {!! Form::open(['action' => ['SalonAdminController@postEditWorkerAlbumImage'] ,'class' => 'form-horizontal','files' =>true  ]) !!}
						  <input type="hidden" name="album_id" class="album_hidden_id">
						  {!! Form::file('album_name', array('class' => 'form-control')) !!}
						  <div class="modal-footer ">
							<button type="submit" class="btn btn-warning btn-lg edit_salon_admin" style="width: 100%;"  data-href="">
								<span class="glyphicon glyphicon-ok-sign"></span>Add
							</button>
						  </div>

						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- end edit img modal --}}
@endsection