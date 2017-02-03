$(document).ready(function(){
	var ru = $('#description_ru').val();
	    am = $('#description_am').val();
	    en = $('#description_en').val();
	    lang = 'am';
	    ruChange = false;
	    enChange = false;
	    amChange = true;
	    $('#description').val(am)

	$('#am').click(function(){
		ruChange = false;
	    enChange = false;
	    amChange = true;
	    lang = 'am';
		$('#description').val(am)
	})
	$('#ru').click(function(){
		ruChange = true;
	    enChange = false;
	    amChange = false;
	    lang = 'ru';
		$('#description').val(ru)
	}) 
	$('#en').click(function(){
		ruChange = false;
	    enChange = true;
	    amChange = false;
	    lang = 'en';
		$('#description').val(en)
	})

	$( "#description" ).keyup(function() {
	  if (amChange == true) {
	  	am = $('#description').val()
	  };
	});
	$( "#description" ).keyup(function() {
	  if (ruChange == true) {
	  	ru = $('#description').val()
	  };
	});	
    $( "#description" ).keyup(function() {
	  if (enChange == true) {
	  	en = $('#description').val()
	  };
	});	
	$(".save").click(function(){
		var text = $('#description').val();
		var id = $(this).attr('data');
		var token = $('#token').val()
		$.ajax({
			type:"POST",
			url: '/salon/edit-salon-descriptions',
			data:{salon_id:id,desc_text:text,desc_lang:lang, _token:token},
			success:function(data){
				if (data == 'false') {
					$('.false').show()
				};
			}
		})
	})
})

function initAutocomplete() {
	var latLngs =  $('.lat').attr('data-lat');
	var  latLngsArray= JSON.parse(latLngs);
    var map = new google.maps.Map(document.getElementById('map_edit'), {
       center: new google.maps.LatLng(parseFloat(latLngsArray[0].lat), parseFloat(latLngsArray[0].lng)),
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		zoom: 10,
	});

    var locations = [];
	$.each(latLngsArray, function(j,item){
		locations.push([parseFloat(item.lat), parseFloat(item.lng)])
	});
	var marker = [];
	var searchBox = [];
	var i, input;

	  for (i = 0; i < locations.length; i++) {  
	  marker[i] = new google.maps.Marker({
	  position: new google.maps.LatLng(locations[i][0], locations[i][1]),
	  map: map,
	  draggable:true,
	  marker_id: i,
	  });
	  input = document.getElementById('pac-input_'+i);
	  searchBox[i] = new google.maps.places.SearchBox(input);

	  google.maps.event.addListener(marker[i], "dragend", function() 
        {
            

		//get the id of the marker
			var marker_id = this.marker_id;
            //match the fields to update
            var lat = document.getElementById('lat_edit_' + marker_id);
            var lng = document.getElementById('lng_edit_' + marker_id);
            var coords = this.getPosition()
            lat.value = coords.lat();
            lng.value = coords.lng();
        });
	  	
    	  

    	// Listen for the event fired when the user selects a prediction and retrieve
    	// more details for that place.
    	google.maps.event.addListener(searchBox[i],'places_changed', function() {
    	  var places = this.getPlaces();
    	  var bounds = new google.maps.LatLngBounds();
    	  var k,place;
    	  for(k=0; place=places[k]; k++){
    	    bounds.extend(place.geometry.location);
    	    marker.setPosition(place.geometry.location); //set marker position new...
    	  }
	
    	  map.fitBounds(bounds);
    	  map.setZoom(15);
    	});
	}


   // Create the search box and link it to the UI element.
    

    // google.maps.event.addListener(marker,'position_changed', function(){
    //   var lat = marker.getPosition().lat();
    //   var lng = marker.getPosition().lng();
    //   $('#lat_edit_'+marker_id).val(lat);
    //   $('#lng_edit'+marker_id).val(lng);
    // })

}