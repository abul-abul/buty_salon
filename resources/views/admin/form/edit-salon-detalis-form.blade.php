<div style="width:40%;margin-left:20%">
	<h1>Edit Salon</h1>
	{!! Form::model($salons,['action' => ['AdminController@postEditSalonDetalis', $salons->id] ,'class' => 'form-horizontal','id'=>'edit_form','files' => 'true' ]) !!}
 	 	<b>Salon Name</b>
 	 	{!! Form::text('name', null, ['placeholder' => 'Enter salon name','class' => 'form-control','id'=>'edit_salon']) !!}<br>
		
		<b>Salon subdomain</b>
 	 	{!! Form::text('sub_domain', null, ['placeholder' => 'Enter salon subdomain','class' => 'form-control','id' => 'edit_salon_subdomain']) !!}<br>
 	 	
 	 	<b>Salon Admin Firstname</b>
 	 	{!! Form::text('firstname', null, ['placeholder' => 'Admin Salon', 'class' => 'form-control']) !!}<br>

 	 	<b>Email</b>
		{!! Form::text('email', null, ['placeholder' => 'Admin email', 'class' => 'form-control']) !!}<br>

		<b>Salon Image</b>
		{!! Form::file('image', null, ['class' => 'form-control']) !!}<br>

		<b>Salon Position</b>
		<select name="position" class="form-control">
			<option>{{$salons->position}}</option>
			@foreach($positions as $position)
				<option  value="{{$position->position}}">{{$position->position}}</option>
			@endforeach
		</select>
		<b>Description</b>
		{!! Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) !!}<br>

		<b>Address</b>
		{!! Form::text('address1', null, ['placeholder' => 'Search Box','class' => 'form-control controls','id'=>'pac-input-edit']) !!}
		@foreach($salons->addresses as $address)
        <input id="lat_edit" type="hidden" data-lat="{{$address->lat}}" value="{{$address->lat}}" name="lat">
        <input id="lng_edit" type="hidden" data-lng="{{$address->lng}}" value="{$address->lng}}" name="lng">
        @endforeach
        <div id="map_edit"></div><br>

		<b>Phonenumber</b>
		{!! Form::text('phonenumber', null, ['placeholder' => 'Phonenumber', 'class' => 'form-control']) !!} <br>

 	 	<div class="modal-footer ">
 	 		<div class="col-md-3"></div>
			<div class="col-md-5">
	      		<button type="submit" class="btn btn-warning btn-lg edit_salon" style="width: 100%;"  data-href="">
					<span class="glyphicon glyphicon-ok-sign"></span>Update
		        </button>
	    	</div>
	    </div>

	{!! Form::close() !!}
</div>