@extends('app-salon-admin')
@section('salon-content')

@if(isset($settings))
	<div class="container">
	    <h2>Salon Admin Settings</h2>
	    @include('message')
	    <table class="table" style="width:91%">
		    <thead>
		      <tr>
		        <th>Salon Name</th>
		        <th>Salon subdomain</th>
		        <th>Salon address</th>
		        <th>Salon position</th>
		        <th>Salon phonenumber</th>
		        <th>Salon email</th>
		        <th>Salon Profile picture</th>
		        <th>Salon Description</th>
		        <th>Workings time and days</th>
		        <th>Edit</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
			    <td>
			      	{!! Form::text('name', $settings->name, ['placeholder' => 'Salon Name', 'class' => 'form-control','disabled'=>'disabled']) !!}
			    </td>
			    <td>
			     	{!! Form::text('sub_domain', $settings->sub_domain, ['placeholder' => 'Sub domain', 'class' => 'form-control','disabled'=>'disabled']) !!}
			    </td>
			    <td>
			     	{!! Form::text('address', $address->address, ['placeholder' => 'Address', 'class' => 'form-control','disabled'=>'disabled']) !!}
			    </td>
			    <td>
			     	{!! Form::text('position', $settings->position, ['placeholder' => 'Address', 'class' => 'form-control','disabled'=>'disabled']) !!}
			    </td>
			    <td>
			     	{!! Form::text('phonenumber', $settings->phonenumber, ['placeholder' => 'Phone Number', 'class' => 'form-control','disabled'=>'disabled']) !!}
			    </td>
			    <td>
			     	{!! Form::text('salon_email', $settings->salon_email, ['placeholder' => 'Salon Email', 'class' => 'form-control','disabled'=>'disabled']) !!}
			    </td>
			    @if($settings->image)
		        	<td><img style="width: 90px;height: 33px" src="/assets/salon_images/{{$settings->image}}"></td>
		        @else
		           	<td><img style="width: 90px;height: 33px" src="/assets/salon_images/img1-md.jpg"></td>
		        @endif
			    <td>
			     	{!! Form::text('description', $settings->description, ['placeholder' => 'Salon Description', 'class' => 'form-control','disabled'=>'disabled']) !!}
			    </td>
			    <td>
			     	{!! Form::text('workings_time_days', $settings->workings_time_days, ['placeholder' => 'Workings time and days', 'class' => 'form-control','disabled'=>'disabled']) !!}
			    </td>
		        <td>
		        <a href="{{action('SalonAdminController@getEditSalonDetalis',$settings->id)}}">
		        	<button class="btn btn-primary btn-xs edit_salon_ajax" data-title="Edit"><i class="fa fa-pencil-square-o"></i></button>
		        </a>
		        	<!-- <button class="btn btn-primary btn-xs edit_salon_admin_ajax" data-title="Edit" alt="{{ csrf_token () }}"  data-toggle="modal" data-target="#edit" data-id="{{$settings->id}}"><i class="fa fa-pencil-square-o"></i></button> -->
		        </td>	 
		      </tr>
		    </tbody>
		</table>
	</div>

	@else
		Not salons
	@endif
@endsection