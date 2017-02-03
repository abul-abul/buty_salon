$(document).ready(function(){
	var x = $('.add_adres').children().last().attr('data-key');
	var removeInput = $('.add_adres').children().last();
	console.log(removeInput);
	$('.salon_category').hide();

	$('.delete_all_notification').hide();
	$('.delete_all_salons').hide();
	$('.delete_all_reviews').hide();
	
	$('.all_review_delete_yes').click(function(){
		review_id_array = [];
		var token = $('.delete_all_reviews').attr('content');
		$('.check_review').each(function(){
			if($(this).prop('checked') == true){
				var id = $(this).attr('data-id');
	            review_id_array.push(id);
			}
	    })
		$.ajax({
	   		type:"post",
	   		datatype:"json",
	   		url:'/en/salon/select-all-delete-reviews',  		
	   		data:{_token:token,id:review_id_array},
	   		success:function(data){
	   			location.reload();
	   		}
	   })
	})

	$('.all_review_salon_delete_yes').click(function(){
		salon_id_array = [];
		var token = $('.delete_all_salons').attr('content');
		$('.check').each(function(){
			if($(this).prop('checked') == true){
				var id = $(this).attr('data-id');
	            salon_id_array.push(id);
			}
	    })
		$.ajax({
	   		type:"post",
	   		datatype:"json",
	   		url:'/en/salon/select-all-delete-reviews',  		
	   		data:{_token:token,id:salon_id_array},
	   		success:function(data){
	   			location.reload();
	   		}
	   })
	})

	window.notivikation_id_array = [];
	$('.check_all').click(function(){	
	$('.delete_all_notification').show();
	$('.delete_all_salons').show();
	$('.delete_all_reviews').show();	
	    if($(this).prop("checked") == true){
	       	$('.check').each(function(){
	           $(this).prop("checked",true);
	           var id = $(this).attr('data-id');
	           notivikation_id_array.push(id);
	      	})
	    }else{    
	    	$('.delete_all_notification').hide();	
	    	$('.delete_all_salons').hide();
			$('.delete_all_reviews').hide();      
	       	$('.check').each(function(){
	           $(this).prop("checked",false);
	           notivikation_id_array.lenght = 0;
	       	})
	    }
	})

	window.send_email_users_add_service = [];
	$('.check_all_users').click(function(){		
	    if($(this).prop("checked") == true){
	       $('.check_user').each(function(){
	           $(this).prop("checked",true);
	           var id = $(this).attr('data-id');
	           send_email_users_add_service.push(id);
	       })
	    }else{          
	       $('.check_user').each(function(){
	           $(this).prop("checked",false);
	           send_email_users_add_service.lenght = 0;
	       })
	    }
	})


	$('.all_delete_yes').click(function(){
		notivikation_id_array = [];
		var token = $('.delete_all_notification').attr('content');
		$('.check').each(function(){
			if($(this).prop('checked') == true){
				var id = $(this).attr('data-id');
	            notivikation_id_array.push(id);
			}
	    })
		$.ajax({
	   		type:"post",
	   		datatype:"json",
	   		url:'/en/salon/select-all-delete-notification',  		
	   		data:{_token:token,id:notivikation_id_array},
	   		success:function(data){
	   			location.reload();
	   		}
	   })
	})


	$('.edit_salon_service_ajax').click(function(){		
		window.id = $(this).attr('data-id');
		var token = $(this).attr('alt');
		$.ajax({
			type:"GET",
			url: '/en/salon/ajax-edit-service/'+id,
			success:function(data){
				$('#edit_salon_services').val(data.services);
				$('#edit_salon_services_price_min').val(data.service_prices_min);
				$('#edit_salon_services_price_max').val(data.service_prices_max);
				$('#edit_salon_services_discount').val(data.discount);
			}
		})
	})


	$('.edit_salon_category_ajax').click(function(){		
		var category_id = $(this).attr('data-id');
		var token = $(this).attr('alt');
		$.ajax({
			type:"GET",
			url: '/en/salon/ajax-edit-category/'+category_id,
			success:function(data){
				$('.category_id').val(category_id);
				$('#edit_category').val(data.category);
			}
		})
	})


	//Edit salon worker detalis
	$('.edit_salon_worker_ajax').click(function(){
		var id = $(this).attr('data-id');
		$('.worker_id').val(id);
		$.ajax({
			type:"GET",
			url: '/en/salon/ajax-edit-worker-detalis/'+id,
			success:function(data){
				$('#edit_worker_username').val(data.username);
				$('#edit_worker_firstname').val(data.firstname);
				$('#edit_worker_lastname').val(data.lastname);
				$('#edit_worker_profession').val(data.profession);
				if(data.category_id != null ){
					$('#edit_category').val(data.category_id);
				}else{
					$('#edit_category').val(0);
				}	
				$('#edit_worker_email').val(data.email);
				$('#edit_worker_phone').val(data.phone);
				$('#edit_worker_address').val(data.address);
			}
		})
	})

	//Activ and passive salon worker
	$('.activ_worker').click(function(){
		var id = $(this).attr('data-id');
		var row = $(this).parent().parent()
		$.ajax({
			type:"GET",
			url: '/en/salon/activation-salon-worker/'+id,
			success:function(data){
				// if(data.activ_inactive == 'active'){
				// 	 $('.active_'+id).toggleClass('btn-danger btn-success');
				// 	 $('.active_'+id).text('Active');
				// 	//row.css('background-color','bisque');
				// }else{
				// 	//row.css('background-color','#fff');
				// }
				location.reload();
			}
		})
	})

	//delete worker jobs
	$('.jogs_img_del').click(function(){
		var id = $(this).attr('data-id');
		var row = $(this).parent();
		var albom_id = $(this).attr('data-albom');
		$.ajax({
			type:"GET",
			url: '/en/salon/delete-worker-jobs/'+id,
			success:function(data){
				console.log(data)
				if(data == true){
					row.hide(1000)
				}
			}
		})
	})

	$('.check').click(function(){
		$('.delete_all_notification').show();
		$('.delete_all_salons').show();
		$('.delete_all_reviews').show();
		var i=0;
		var j=0;
		$('.check').each(function(){
			j++;
			if($(this).prop("checked") == false){
			}else{
				i++;
			}
		})
		if(i==j){
			$('.check_all').prop("checked",true);
		}
	})

	$('.check').click(function(){
		var i=0;
		var j=0;
		$('.check').each(function(){
			j++;
			if($(this).prop("checked") == true){
			}else{
				i++;
			}
		})
		if(i==j){
			$('.delete_all_notification').hide();
			$('.delete_all_salons').hide();
			$('.delete_all_reviews').hide();
			$('.check_all').prop("checked",false);
		}
	})
	$('.check_user').click(function(){
		var i=0;
		var j=0;
		$('.check_user').each(function(){
			j++;
			if($(this).prop("checked") == false){
			}else{
				i++;
			}
		})
		if(i==j){
			$('.check_all_users').prop("checked",true);
		}
	})
	
	$('.check_user').click(function(){
		var i=0;
		var j=0;
		$('.check_user').each(function(){
			j++;
			if($(this).prop("checked") == true){
			}else{
				i++;
			}
		})
		if(i==j){
			$('.check_all_users').prop("checked",false);
		}
	})


	$('.edit_worker_albom_name').click(function(){
		var inp = $(this).prev();
		var text = $(this).parent().prev();
		var success_button = $(this).next();
		inp.css('display','block')
		text.css('display','none');
		inp.trigger('focus')
		$(this).css('display','none');
		success_button.css('display','block');
	})

	$('.success_albom').click(function(){
		var its = $(this);
		var id = $(this).attr('data-id');
		var album_name = $(this).prev().prev().val();
		var inp = $(this).prev().prev();
		var edit_button = $(this).prev();
		var text = $(this).parent().prev();
		if(album_name == ''){
			inp.css('border','1px solid red')
		}else{
			$.ajax({
				type:"GET",
				url: '/salon/edit-worker-albom-name/'+id,
				data:{album_name:album_name},
				success:function(data){
					text.css('display','block');
					text.text(data.album_name);
					its.css('display','none');
					inp.css('display','none');
					edit_button.css('display','block');
					inp.css('border','1px solid #4CAF50')
				}
			})
		}
		
	})

	//filer workers jobs
	$('.filter_worker_jobs').change(function(){
		var category_id = $(this).attr('data-catid');
		var salon_id = $(this).attr('data-salonid');
		var worker_id = $(this).val();
		var token = $('.worker_token').val();
		workercontent = '';
		jobscontent = '';
		$.ajax({
			type:"post",
			url: '/salon/workers-jobs',
			data:{_token:token,salon_id:salon_id,worker_id:worker_id,category_id:category_id},
			success:function(data){
				if(data.worker.profile_picture == null){
					workercontent += "<div><h1>Worker</h1><img style='width:100px' src='/assets/salon-worker/worker-images/photo.jpg'><br><span style='margin: 0 0 0 25px;font-size: 20px;'>"+data.worker.firstname+"</span></div>"
				}else{
					workercontent += "<div><h1>Worker</h1><img style='width:100px' src='/assets/salon-worker/worker-images/"+data.worker.profile_picture+"'><br><span style='margin: 0 0 0 25px;font-size: 20px;'>"+data.worker.firstname+"</span></div>"
				}
				$.each(data.jobs, function( index, value ) {
					if(value.album_prof_pic == null){
						jobscontent += "<div style='width:200px;float:left;margin-right: 43px;'><h3>Worker albom</h3><div><img style='width:100%;height: 149px;' src='/assets/user/images/img1-md.jpg'><br><a href='http://beauty-salons.dev/salon/album-images/"+value.id+"'>"+value.album_name+"</a><button data-toggle='modal' style='width:100%' data-target='#myModal' data-id='"+value.id+"' data-href='http://beauty-salons.dev/salon/album-delete/"+value.id+"' class='btn btn-danger delete_album'>Delete</button></div></div>"
					}else{
						jobscontent += "<div style='width:200px;float:left;margin-right: 43px;'><h3>Worker albom</h3><div><img style='width:100%' src='/assets/salon-worker/album-profile-pictures/"+value.album_prof_pic+"'><br><a href='http://beauty-salons.dev/salon/album-images/"+value.id+"'>"+value.album_name+"</a><button data-toggle='modal' data-target='#myModal' data-id='"+value.id+"' data-href='http://beauty-salons.dev/salon/album-delete/"+value.id+"' style='width:100%'  class='btn btn-danger delete_album'>Delete</button></div></div>"
					}
				  	
				});
				$('.worker_block').html(workercontent);
				$('.workers_jobs_block').html(jobscontent);
			}
		})
	})

	$(document).on('click','.delete_worker_jobs',function(){
		var id = $(this).attr('data-id');
		var row = $(this).parent();
		$.ajax({
			type:"get",
			url: '/salon/delete-worker-job/'+id,
			success:function(data){
				row.hide(500);
			}
		})
	})

	$('.workers_jobs_in_albom').change(function(){
		var worker_id = $(this).val();
		var htmlContent = "";
		$.ajax({
			type:"get",
			url: '/salon/select-albom-worker/'+worker_id,
			success:function(data){
				$.each(data, function( index, value ) {
				  	//console.log(value)
				  	htmlContent +="<option value='"+value.id+"'>"+value.album_name+"</option>"
				});
				$('.worker_albom').html(htmlContent);
				//console.log(data)
			}
		})
	})

	$(document).on('click','.delete_album',function(){
		var url = $(this).attr('data-href');
		$('.delete_salon_yes').attr('href',url);
	})


	$('.albom_img').click(function(){
		var album_id = $(this).attr('data-id')
		$('.album_hidden_id').val(album_id)
	})
	$('.add_input').click(function(){
		x++;
		$('.add_adres').append("<input  type='text' name='addresses[]' style='margin-bottom:5px;' placeholder='Enter Address' class='form-control controls'/>");
		$('.add_inp').append("<input  type='hidden' name='lat[]' value='40.17868892305818' class='lat'/>");
		$('.add_inp').append("<input  type='hidden' name='lng[]' value='44.498930291479496'/>");
	})
});

