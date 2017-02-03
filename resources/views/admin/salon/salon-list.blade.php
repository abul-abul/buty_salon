@extends('app-admin')
@section('content')

<div class="container">
	<h2>Salon Admin  list</h2>
	@if(count($salons) == 0)
	<h4> Not Salons </h4>
	@else
	<table class="table">
		<thead>
			<tr>
				<th>Salon</th>
				<th>Salon subdomain</th>
{{--             <th>Salon description</th> --}}
				<th>Salon position</th>
				<th>Salon Address</th>
				<th>Salon phonenumber</th>
				<th>Salon email</th>
				<th>Salon Images</th>
				<th>Offers Active/Inactive</th>
				<th>Slide Active/Inactive</th>
			<th>Salon Active/Inactive</th>
				<th>Edit/Delete</th>
			</tr>
		</thead>
		@foreach($salons as $salon)
			<tbody>
			  <tr>
				<td>{{$salon->name}}</td>
				<td>{{$salon->sub_domain}}</td>
{{--             <td>{{$salon->description}}</td> --}}
				<td>{{$salon->position}}</td>
				<td>{{$salon->addresses[0]->address}}</td>
				<td>{{$salon->phonenumber}}</td>
				<td>{{$salon->salon_email}}</td>
				@if(isset($salon->image))
					<td><img style="width: 93px;height:35px" src="/assets/salon_images/{{$salon->image}}"></td>
				@else
					<td><img style="width: 93px;height:35px" src="/assets/salon_images/img1-md.jpg"></td>
				@endif  
				@if($salon->status == true)
					<td><button type="button" data-id="{{$salon->id}}"   class="btn btn-success active_inactive active_{{$salon->id}}">Active</button></td>
				@else
					<td><button type="button" data-id="{{$salon->id}}"   class="btn btn-danger active_inactive active_{{$salon->id}}">Inactive</button></td>
				@endif
				@if($salon->slide_active == true)
					<td><button type="button" data-id="{{$salon->id}}"   class="btn btn-success slide_active_inactive slide_{{$salon->id}}">Active</button></td>
				@else
					<td><button type="button" data-id="{{$salon->id}}"   class="btn btn-danger slide_active_inactive slide_{{$salon->id}}">Inactive</button></td>
				@endif
				@if($salon->salon_status == true)
					<td><button type="button" data-id="{{$salon->id}}"  data="{{$salon->salon_status}}" class="btn btn-success salon_active_inactive salon_{{$salon->id}}">Active</button></td>
				@else
					<td><button type="button" data-id="{{$salon->id}}"  data="{{$salon->salon_status}}" class="btn btn-danger salon_active_inactive salon_{{$salon->id}}">Inactive</button></td>
				@endif
				<td>
				<a href="{{action('AdminController@getEditSalonDetalis',$salon->id)}}">
					<button class="btn btn-primary btn-xs edit_salon_ajax" data-title="Edit"><i class="fa fa-pencil-square-o"></i></button>
				</a>    
					<button data-toggle="modal" class="btn-danger btn-xs delete_salon" data-href="{{action('AdminController@getDeleteOneSalon' , $salon->id)}}"  data-target="#myModal"><i class="fa fa-times"></i></button>
				</td>   
			  </tr>
			</tbody>
		@endforeach
	</table>
	@endif
</div>
<center>{!! $salons->render() !!}</center>

{{-- Delete modal --}}
<div class="container">
  <!-- Modal -->
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

{{-- Edit modal --}}

	<!-- Modal Dialog to Edit Domains -->
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
					<h4 class="modal-title custom_align" id="Heading">Edit Salon</h4>
				</div>
				<div class="modal-body">
					<!-- @include('message') -->
					<p id="message"></p>
					{!! Form::open(['action' => ['AdminController@getEditSalon'] ,'class' => 'form-horizontal','id'=>'edit_form' ]) !!}
						<b>Salon</b>
						{!! Form::text('name', null, ['placeholder' => 'Enter salon name','class' => 'form-control','id'=>'edit_salon']) !!}<br>
						<b>Salon subdomain</b>
						{!! Form::text('sub_domain', null, ['placeholder' => 'Enter salon subdomain','class' => 'form-control','id' => 'edit_salon_subdomain']) !!}
						<b>Salon firstname</b>
						{!! Form::text('firstname', null, ['placeholder' => 'Admin Salon', 'class' => 'form-control']) !!}

						<b>Email</b>
						{!! Form::text('email', null, ['placeholder' => 'Admin email', 'class' => 'form-control']) !!}

						<b>Salon Image</b>
						{!! Form::file('image', null, ['class' => 'form-control']) !!}

						<b>Description</b>
						{!! Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) !!}

						<b>Address</b>
						{!! Form::text('address1', null, ['placeholder' => 'Search Box','class' => 'form-control controls','id'=>'pac-input']) !!}
						<div id="map"></div>

						<b>Phonenumber</b>
						{!! Form::text('phonenumber', null, ['placeholder' => 'Phonenumber', 'class' => 'form-control']) !!} 

						<div class="modal-footer ">
							<button type="button" class="btn btn-warning btn-lg edit_salon" style="width: 100%;"  data-href="">
								<span class="glyphicon glyphicon-ok-sign"></span>Update
							</button>
						</div>
					{!! Form::close() !!}
<script type="text/javascript">
	 function initAutocomplete() {

		var map = new google.maps.Map(document.getElementById('map'), {
		  center: {lat: -33.8688, lng: 151.2195},
		  zoom: 13,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		});

		// Create the search box and link it to the UI element.
		var input = document.getElementById('pac-input');
		var searchBox = new google.maps.places.SearchBox(input);
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

		// Bias the SearchBox results towards current map's viewport.
		map.addListener('bounds_changed', function() {
		  searchBox.setBounds(map.getBounds());
		});

		var markers = [];
		// Listen for the event fired when the user selects a prediction and retrieve
		// more details for that place.
		searchBox.addListener('places_changed', function() {
		  var places = searchBox.getPlaces();

		  if (places.length == 0) {
			return;
		  }

		  // Clear out the old markers.
		  markers.forEach(function(marker) {
			marker.setMap(null);
		  });
		  markers = [];

		  // For each place, get the icon, name and location.
		  var bounds = new google.maps.LatLngBounds();
		  places.forEach(function(place) {
			var icon = {
			  url: place.icon,
			  size: new google.maps.Size(71, 71),
			  origin: new google.maps.Point(0, 0),
			  anchor: new google.maps.Point(17, 34),
			  scaledSize: new google.maps.Size(25, 25)
			};

			// Create a marker for each place.
			markers.push(new google.maps.Marker({
			  map: map,
			  icon: icon,
			  title: place.name,
			  position: place.geometry.location
			}));

			if (place.geometry.viewport) {
			  // Only geocodes have viewport.
			  bounds.union(place.geometry.viewport);
			} else {
			  bounds.extend(place.geometry.location);
			}
		  });
		  map.fitBounds(bounds);
		});

		var geocoder = new google.maps.Geocoder();
		var address = "komitas 4";

		geocoder.geocode( { 'address': address}, function(results, status) {

		if (status == google.maps.GeocoderStatus.OK) {
			var latitude = results[0].geometry.location.lat();
			var longitude = results[0].geometry.location.lng();
			} 
		});
	
	  }
</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuAj4Vt4LLYCCyBQHFx--6S9RcCQp4Ss&libraries=places&callback=initAutocomplete"
		 async defer></script>
</script>    
				</div>
			   <!--  <div class="modal-backdrop"></div> -->
			</div>   
		<!-- /.modal-content --> 
		</div>
		<!-- /.modal-dialog -->
	</div>
{{-- end edit modal --}}
@endsection