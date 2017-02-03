@extends('app-salon-admin')
@section('salon-content')
	@include('message')
	<div style="width:40%;margin-left:20%">
	{!! Form::open(['action' => ['SalonAdminController@postAddAlbom',$id] ,'class' => 'form-horizontal','files' =>true ]) !!}
	 	<b>Albom</b>
      	{!! Form::text('album_name', null, ['placeholder' => 'Albom Name', 'class' => 'form-control']) !!}<br>

     	<b>Albom Pictures</b>
     	{!! Form::file('album_prof_pic',null, ['class' => 'form-control']) !!}<br>

  		<button type="submit" style="margin-top:10px" class="btn btn-warning">
			<span class="glyphicon glyphicon-ok-sign"></span>Add
        </button>
	{!! Form::close() !!} 
	</div>
@endsection