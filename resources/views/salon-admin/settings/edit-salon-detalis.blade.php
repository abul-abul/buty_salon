@extends('app-salon-admin')
@section('salon-content')
<style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map_edit {
        width: 100%;
        height: 500px;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }
      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
      #target {
        width: 345px;
      }
      .false{
      	display:none;
      	margin-left: 220px;
      	color:red;
      	font-size: 20px;
      }
</style>

<div style="width:40%;margin-left:20%">
	<input type="hidden" id="token"  value="{{ csrf_token () }}">
	<input type="hidden" id="description_ru" value="{{$salons->description_ru}}">
	<input type="hidden" id="description_am" value="{{$salons->description_am}}">
	<input type="hidden" id="description_en" value="{{$salons->description_en}}">
	<h1>Edit Salon</h1>
	{!! Form::model($salons,['action' => ['SalonAdminController@postEditSalonSettings',$salons->id] ,'class' => 'form-horizontal','id'=>'edit_form','files' => 'true' ]) !!}
 	 	<b>Salon Name</b>
 	 		{!! Form::text('name', null, ['placeholder' => 'Enter salon name','class' => 'form-control','id'=>'edit_salon']) !!}<br>	
		<b>Salon subdomain</b>
 	 		{!! Form::text('sub_domain', null, ['placeholder' => 'Enter salon subdomain','class' => 'form-control','id' => 'edit_salon_subdomain']) !!}<br>
 		<b>Phone Number</b>
			{!! Form::text('phonenumber', $salons->phonenumber, ['placeholder' => 'Phone Number', 'class' => 'form-control']) !!}<br>
    <b>Salon Position</b>
    <select name="position" class="form-control" id="sel1">
    <option selected="true">{{ $salons->position }}</option>
      @foreach($positions as $position)
        <option class="{{$position->position}}">{{$position->position}}</option>
      @endforeach
    </select><br>
		<b>Salon Email</b>
		{!! Form::text('salon_email', $salons->salon_email, ['placeholder' => 'Salon Email', 'class' => 'form-control',]) !!}<br>
		<b>Salon Profile Picture</b>
	    {!! Form::file('image', array('id' => 'photo', 'class' => 'profile_picture')) !!}<br>
		<P><b>Salon Description</b></P>
		<div class="btn-group " style="margin-bottom:5px;">
			<button class="btn btn-primary btn-small" id="am" style="margin-right:5px;" type="button">Հայերեն</button>
			<button class="btn btn-primary btn-small" id="en" style="margin-right:5px;" type="button">English</button>
			<button class="btn btn-primary btn-small" id="ru" type="button">Русский</button>
		</div><br>
			<textarea class="form-control" rows="6" id="description"></textarea><br>
			<span class="false">Something went wrong!</span>
			<button class="btn btn-primary btn-small save" data="{{$salons->id}}"  style="float:right;margin-top:-13px;" type="button">Save</button><br>
		<b>Workings time and days</b>
			{!! Form::text('workings_time_days', $salons->workings_time_days, ['placeholder' => 'Workings time and days', 'class' => 'form-control']) !!}<br> 	
		<b>Addresses</b><br>
        <div class="btn-group add_adres" style="margin-bottom:5px;">
            <span class="glyphicon glyphicon-plus add_input" style="float:right;margin-top:8px;margin-left:14px;cursor:pointer;"></span>
            <span class="glyphicon glyphicon-minus remove_input" style="float:right;margin-top:8px;margin-left:14px;cursor:pointer;"></span>
            @foreach($salons->addresses as $key => $address)
                <input  type="text" style="margin-right:13px; margin-bottom:5px;" data-key="{{$key}}" name="addresses[]" placeholder="{{$address->address}}" value="{{$address->address}}" class="form-control controls" id="pac-input_{{$key}}"/>
            @endforeach
        </div>
        <div class="btn-group add_inp">    
            @foreach($salons->addresses as $key => $address)
              <input id="lat_edit_{{$key}}" type="hidden" data-lat="{{$salons->addresses}}" value="{{$address->lat}}" name="lat[]" class="lat">
              <input id="lng_edit_{{$key}}" type="hidden" data-lng="{{$address->lng}}" value="{{$address->lng}}" name="lng[]" >
            @endforeach
         </div><br>    
        <div id="map_edit"></div><br>
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
@endsection
@section('scripts')
{!! HTML::script( asset('assets/salon-admin/js/edit-description.js') ) !!}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuAj4Vt4LLYCCyBQHFx--6S9RcCQp4Ss&libraries=places&callback=initAutocomplete"
     async defer>
</script>
@endsection
