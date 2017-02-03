<style>
    html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    }
    #map {
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
    }

    #pac-input {
    background-color: #fff;
    font-family: Roboto;
    font-size: 15px;
    font-weight: 300;
    margin-left: 12px;
    padding: 0 11px 0 13px;
    text-overflow: ellipsis;
    width: 300px;
    }

    #pac-input:focus {
    border-color: #4d90fe;
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
  </style>
  <div style="width:40%;margin-left:20%">
    <h1>Add Salon</h1>
  {!! Form::open(['action' => ['AdminController@postAddSalon'] ,'class' => 'form-horizontal','files' =>true ]) !!}
    <b>Salon Name</b>
    {!! Form::text('name', null, ['placeholder' => 'Salon Name', 'class' => 'form-control']) !!}<br>
    
    <b>Admin First Name</b>
    {!! Form::text('firstname', null, ['placeholder' => 'Admin Salon', 'class' => 'form-control']) !!}<br>
   
    <b>Sub Domain</b>
    {!! Form::text('sub_domain', null, ['placeholder' => 'Salon subdomain', 'class' => 'form-control']) !!}<br>

    <b>Email</b>
    {!! Form::text('email', null, ['placeholder' => 'Admin email', 'class' => 'form-control']) !!}<br>
    
     <b>Salon position</b>
     <select name="position" class="form-control" id="sel1">
      
      @foreach($positions as $position)
        <option value="{{$position->position}}">{{$position->position}}</option>
      @endforeach
     </select> 
    <b>Salon Image</b>
    {!! Form::file('image', null, ['class' => 'form-control']) !!}<br>

    <b>Description</b>
    {!! Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) !!}<br>

    <b>Address</b>
    {!! Form::text('address1', null, ['placeholder' => 'Search Box','class' => 'form-control controls','id'=>'pac-input']) !!}
    <div id="map"></div> 
    {!! Form::hidden('lat', '40.1791857', ['placeholder' => 'Lat','class' => 'form-control controls','id'=>'lat']) !!}
    {!! Form::hidden('lng', '44.499102900000025', ['placeholder' => 'Lng','class' => 'form-control controls','id'=>'lng']) !!}
    <br>

    <b>Phonenumber</b>
    {!! Form::text('phonenumber', null, ['placeholder' => 'Phonenumber', 'class' => 'form-control']) !!}<br>

    <b>Passoword</b>
    {!! Form::password('password',  ['placeholder' => 'Admin Password', 'class' => 'form-control']) !!}<br>
  <br>
  <div class="modal-footer ">
    <div class="col-md-3"></div>
    <div class="col-md-5">
    <button type="submit" class="btn btn-warning btn-lg" id="add_salon_submit" style="width: 100%;"  data-href="">
        <span class="glyphicon glyphicon-ok-sign"></span>Add
    </button>
  </div>
  </div>
{!! Form::close() !!}
</div>
<script>
 function initAutocomplete() {

    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 40.17868892305818, lng: 44.498930291479496},
      zoom: 13,
    });
    var marker = new google.maps.Marker({
      position: {lat: 40.17868892305818, lng: 44.498930291479496},
      map: map,
      draggable:true
    });

    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);

    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    google.maps.event.addListener(searchBox,'places_changed', function() {
      var places = searchBox.getPlaces();
      var bounds = new google.maps.LatLngBounds();
      var i,place;

      for(i=0; place=places[i]; i++){
        bounds.extend(place.geometry.location);
        marker.setPosition(place.geometry.location); //set marker position new...
      }

      map.fitBounds(bounds);
      map.setZoom(15);
    });

    google.maps.event.addListener(marker,'position_changed', function(){
      var lat = marker.getPosition().lat();
      var lng = marker.getPosition().lng();
      $('#lat').val(lat);
      $('#lng').val(lng);
    })
  
    }
</script>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuAj4Vt4LLYCCyBQHFx--6S9RcCQp4Ss&libraries=places&callback=initAutocomplete"
     async defer>
  </script>