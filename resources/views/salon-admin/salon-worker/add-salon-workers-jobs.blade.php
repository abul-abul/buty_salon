@extends('app-salon-admin')
@section('salon-content')
@if(count($workers) != 0)
	<h1>Add Salon worker jobs</h1>
	<div class="container" style="width:89%">
	    <table class="table">
		    <thead>
		        <tr>
		          <th>Worker User Name</th>
		          <th>Worker First name</th>
		          <th>Worker Last name</th>
		          <th>Worker Albom List</th>
		          <th>Add Worker Albom</th>
		          <th>Worker Portfolio</th>
		        </tr>
		        <tr>  
					@foreach($workers as $work)
					<tbody>
						<td>{{$work->username}}</td>
						<td>{{$work->firstname}}</td>
						<td>{{$work->lastname}}</td>
						<td><a href="{{action('SalonAdminController@getSalonWorkerAlbomList',$work->id)}}">Alboms list</a></td>
						<td><a href="{{action('SalonAdminController@getAddWorks',$work->id)}}">Add album</a></td>
						<td><a href="{{action('SalonAdminController@getPortfolio',$work->id)}}">Portfolio</a></td>
					</tbody>	
					@endforeach
				</tr>
			</thead>
		</table>	
@else
	not worker
@endif
@endsection