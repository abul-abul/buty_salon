$(document).ready(function(){
	// $('.edit_salon_ajax').click(function(){
	// 	window.id = $(this).attr('data-id');
	// 	var token = $(this).attr('alt');
	// 	$.ajax({
	// 		type:"GET",
	// 		url: 'ajax-edit/'+id,
	// 		success:function(data){
	// 			$('#edit_salon').val(data.name);
	// 			$('#edit_salon_subdomain').val(data.sub_domain);
	// 		}
	// 	})
	// })
    // CKEDITOR.replace('description');
    // $(".textarea").wysihtml5();

	$('.edit_salon').click(function(){
		var salon = $('#edit_salon').val();
		var salon_subdomain = $('#edit_salon_subdomain').val();
		$.ajax({
			type:"GET",
			url: 'edit-salon/'+id,
			data:{name:salon,sub_domain:salon_subdomain},
			success:function(data){
				if(data == "error") {
                    $( "#message" ).empty();
                    $html = '<div class="col-md-12" >';
                    $html += '<div class="alert alert-danger">please enter name and subdomain';
                    $html += '</div>';
                    $html += '</div>';
                    $( "#message" ).html($html);
                }else{
                	location.reload();
                }
			}
		})
	})
		$('.check_user_salon').click(function(){
		var i=0;
		var j=0;
		$('.check_user_salon').each(function(){
			j++;
			if($(this).prop("checked") == false){
			}else{
				i++;
			}
		})
		if(i==j){
			$('.check_all_users_salon').prop("checked",true);
		}
	})
	
	$('.check_user_salon').click(function(){
		var i=0;
		var j=0;
		$('.check_user_salon').each(function(){
			j++;
			if($(this).prop("checked") == true){
			}else{
				i++;
			}
		})
		if(i == j){
			$('.check_all_users_salon').prop("checked",false);
		}
	})

	window.send_email_users_add_salon= [];
	$('.check_all_users_salon').click(function(){		
	    if($(this).prop("checked") == true){
	       $('.check_user_salon').each(function(){
	           $(this).prop("checked",true);
	           var id = $(this).attr('data-id');
	           send_email_users_add_salon.push(id);
	       })
	    }else{          
	       $('.check_user_salon').each(function(){
	           $(this).prop("checked",false);
	           send_email_users_add_salon.lenght = 0;
	       })
	    }
	})


	window.subscribe_id_array = [];
	$('.senc_email_salons').click(function(){	
		var message = $('.text_email').val();
		var token = $('#token').attr('data');
		$('.check_user_salon').each(function(){
			if($(this).prop('checked') == true){
				var id = $(this).attr('data-id');
				subscribe_id_array.push(id);
	    	}
		});
		if(message != ''){
		    if(subscribe_id_array != ''){
	    		$.ajax({
			   		type:"post",
			   		datatype:"json",
			   		url:'/en/admin/send-email-users-new-salon',  		
			   		data:{_token:token,emails:subscribe_id_array,text:message},
			   		success:function(data){
			   			$("#message_salon").empty();
				        $html = '<div class="col-md-12" >';
				        $html += '<div class="alert alert-success">Message Sent Checked Emails';
				        $html += '</div>';
				        $html += '</div>';
				        $("#message_salon").html($html);
			   		}
			   	})
		    }else{
				$("#message_salon").empty();
		        $html = '<div class="col-md-12" >';
		        $html += '<div class="alert alert-danger">Please check user';
		        $html += '</div>';
		        $html += '</div>';
		        $("#message_salon").html($html);
			}
		}else{
	        $("#message_salon").empty();
	        $html = '<div class="col-md-12" >';
	        $html += '<div class="alert alert-danger">Please write message';
	        $html += '</div>';
	        $html += '</div>';
	        $("#message_salon").html($html);
		}
	})


    $(document).on('click', '.active_inactive', function(){
		var id = $(this).attr('data-id');
		var status = $('.salon_'+id).attr('data');
		console.log(status);
		if(status == 0){
			return;
		}
	    else{
		    $.ajax({
			  type:"GET",
			  url: 'edit-status/'+id,
			  data:{salon_id: id},
			  success:function(data){
				if(status == 0){
			        return false;
		        }
				if(data.status == 1){
					$('.active_'+id).addClass('btn-success');
                    $('.active_'+id).removeClass('btn-danger');
					$('.active_'+id).text('Active');
				}else{
					$('.active_'+id).removeClass('btn-success');
                    $('.active_'+id).addClass('btn-danger');
					$('.active_'+id).text('Inactive');
				}
			}
		})
	  }
		
	})



	$('.slide_active_inactive').click(function(){
		var id = $(this).attr('data-id');
		var status = $('.salon_'+id).attr('data');
		if (status == 0) {
			return;
		}
	  else{
		$.ajax({
			type:"GET",
			url: '/admin/edit-slide-status/'+id,
			success:function(data){
				if(status == 0){
			         return false;
		        }
				if(data.slide_active == 1){
					$('.slide_'+id).addClass('btn-success');
					$('.slide_'+id).removeClass('btn-danger');
					$('.slide_'+id).text('Active');
				}else{
					$('.slide_'+id).removeClass('btn-success');
					$('.slide_'+id).addClass('btn-danger');
					$('.slide_'+id).text('Inactive');
				}
			}
		})
	  } 	
	})


	$('.salon_active_inactive').click(function(){
		var id = $(this).attr('data-id');
		$.ajax({
			type:"GET",
			url: '/admin/edit-salon-status/'+id,
			success:function(data){
				if (data.salon_status == 1) {
					$('.salon_'+id).toggleClass('btn-danger btn-success');
					$('.salon_'+id).text('Active');
					$('.salon_'+id).attr('data',1);
				} else {
					$('.salon_'+id).toggleClass('btn-success btn-danger');
					$('.salon_'+id).text('Inactive');
					$('.salon_'+id).attr('data',0);
					$('.slide_'+id).removeClass('btn-success');
					$('.slide_'+id).addClass('btn-danger');
					$('.slide_'+id).text('Inactive');
					$('.active_'+id).removeClass('btn-success');
					$('.active_'+id).addClass('btn-danger');
					$('.active_'+id).text('Inactive');
				}
			}
		})
	})

	$('.user_active_admin').click(function(){
		var id = $(this).attr('data-id');
		$.ajax({
			type:"GET",
			url: '/admin/active-user/'+id,
			success:function(data){
				location.reload();
			}
		})

	})


	$('.edit_article_images').click(function(){
		var article_id = $(this).attr('data-articleid');
		var image_id = $(this).attr('data-imageid');
		$.ajax({
			type:"GET",
			url: '/admin/edit-article-images/'+article_id + '/' + image_id,
			success:function(data){
				location.reload()
			}
		})
	})

	$('.delete_article').click(function(){
		var url = $(this).attr('data-href');
		$('.delete_article_yes').attr('href',url);
	})


	$('#pac-input').keydown(function(event){   
	    if(event.keyCode==13){
	    	$('#add_salon_submit').attr("disabled", true);
	    }

	});
	$('#pac-input').blur(function(){
		$('#add_salon_submit').attr("disabled", false);
	})

	$('#pac-input-edit').keydown(function(event){ 
	    if(event.keyCode==13){
	    	$('.edit_salon').attr("disabled", true);
	    }
	});
	$('#pac-input-edit').blur(function(){
		$('.edit_salon').attr("disabled", false);
	})
	//initAutocomplete();

})
	//google map
	 // function initAutocomplete() {

		// var map = new google.maps.Map(document.getElementById('map'), {
		//   center: {lat: 40.17868892305818, lng: 44.498930291479496},
		//   zoom: 13,
		// });
		// var marker = new google.maps.Marker({
		//   position: {lat: 40.17868892305818, lng: 44.498930291479496},
		//   map: map,
		//   draggable:true
		// });

		// // Create the search box and link it to the UI element.
		// var input = document.getElementById('pac-input');
		// var searchBox = new google.maps.places.SearchBox(input);

		// // Listen for the event fired when the user selects a prediction and retrieve
		// // more details for that place.
		// google.maps.event.addListener(searchBox,'places_changed', function() {
		// 	var places = searchBox.getPlaces();
		// 	var bounds = new google.maps.LatLngBounds();
		// 	var i,place;

		// 	for(i=0; place=places[i]; i++){
		// 		bounds.extend(place.geometry.location);
		// 		marker.setPosition(place.geometry.location); //set marker position new...
		// 	}

		// 	map.fitBounds(bounds);
		// 	map.setZoom(15);
		// });

		// google.maps.event.addListener(marker,'position_changed', function(){
		// 	var lat = marker.getPosition().lat();
		// 	var lng = marker.getPosition().lng();
		// 	$('#lat').val(lat);
		// 	$('#lng').val(lng);
		// })
	
	 //  }

	  //en google map