@extends('app-salon-admin')
@section('salon-content')
	<p id="text"></p>
	<h1 style="margin-top:90px">Subscripe Email List</h1>
	<button content="{{ csrf_token() }}"  class="btn-success btn-xs all_users"> Send email checked users </button>
	<table class="table">
		<thead>
			<tr>
				<th><input type="checkbox"  class="check_all_users"> Check All </th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
		@foreach($emails as $email)	
			<tr>
				<th><input class="check_user" data-id='{{$email->id}}'  type="checkbox"></th>
				<td>{{$email->email}}</td>
			</tr>
		@endforeach  
		</tbody>
	</table>
	<div class="col-md-12 salon_category">
		<div class="col-md-3" >
			<button  class="btn-primary  btn-xs"><a style="color:white" href="{{action('SalonAdminController@getSalonCategoryList')}}"> Salon Category List </a></button>
		</div>
	</div>
@endsection
