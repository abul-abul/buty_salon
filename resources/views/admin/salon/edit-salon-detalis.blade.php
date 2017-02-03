@extends('app-admin')
@section('content')
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
      }

      #pac-input-edit {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input-edit:focus {
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

	@include('admin.form.edit-salon-detalis-form')
	<script type="text/javascript">
 function initAutocomplete() {

      var lat =   parseFloat($('#lat_edit').attr('data-lat'));
      var lng =   parseFloat($('#lng_edit').attr('data-lng'));

      var map = new google.maps.Map(document.getElementById('map_edit'), {
        center: {lat: lat , lng: lng},
        zoom: 15,
      });

      var marker = new google.maps.Marker({
        position: {lat: lat, lng: lng},
        map: map,
        draggable:true
      });


    // Create the search box and link it to the UI element.
    var input = document.getElementById('pac-input-edit');
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
      $('#lat_edit').val(lat);
      $('#lng_edit').val(lng);
    })

      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuAj4Vt4LLYCCyBQHFx--6S9RcCQp4Ss&libraries=places&callback=initAutocomplete"
         async defer>
    </script>
@endsection