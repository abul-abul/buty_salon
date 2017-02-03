$(document).ready(function(){

	$(window).load(function(){
		//$('.bx-clone').removeClass('inner');
		$('.inner').removeClass('bx-clone');
		//$('.bx-clone').removeAttr('style');
		//$('.bx-clone').remove(':nth-child(1)')
		//$('.grid-carousel').children(':nth-child(1)').remove()
	})


	$('#log_rew').click(function(){
		$('#close_modal').click();
	});

	$('.loading_button_a').hide();
	$('.loading_review').hide();
	$('#phone').hide();
	$('#salon').hide();

	$("#select_subscripe").change(function(){
		$('#email').toggle();
		$('#phone').toggle();
	});
	
	$("#select_role").change(function(){
		$('#user').toggle();
		$('#salon').toggle();

	});


	// $("#user_map").click(function(){
	//     location.reload();
	// });

//subscribe
	$('#subscribe').click(function(){
		var email1  = $('#email_input').val();
		var phone1 = $('#phone_input').val(); 
		var token = $('#token').attr('data');
		var salon_id1 = $('#token').data('id');
		var lang = $('#language').attr('data-lang');
		$.ajax({
			url: '/'+lang+'/user/subscribe',
			type:"post",
			data:{_token:token,email:email1,phone:phone1,salon_id:salon_id1},
			success: function(data)
			{    
				if(data == "error") {
					$( "#message" ).empty();
					$html = '<div class="col-md-12" >';
					$html += '<div class="alert alert-danger">'+ window.trans('email_or_mobile_phone_required');
					$html += '</div>';
					$html += '</div>';
					$( "#message" ).html($html);
				}  
				if(data == "error_email") {
					$( "#message" ).empty();
					$html = '<div class="col-md-12" >';
					$html += '<div class="alert alert-danger">'+ window.trans('please_enter_a_valid_email');
					$html += '</div>';
					$html += '</div>';
					$( "#message" ).html($html);
				}
				if(data == "error_phone") {
					$( "#message" ).empty();
					$html = '<div class="col-md-12" >';
					$html += '<div class="alert alert-danger">'+ window.trans('please_enter_a_valid_phone');
					$html += '</div>';
					$html += '</div>';
					$( "#message" ).html($html);
				}
				if(data == "ok_email") {
					location.reload();
				}
				if(data == "ok_phone") {
					location.reload();
				}
			}
		})
	})


//unsubscribe
	$('#unsub').click(function(){
		var token = $('#token').attr('data');
		var salon_id1 = $('#token').data('id');
		var lang = $('#language').attr('data-lang');
		$.ajax({
			url:'/'+lang+'/user/unsubscribe',
			type:"post",
			data:{_token:token,salon_id:salon_id1},
			success: function(data)
			{   
				if(data == "unsubscribe"){
					location.reload();
				}     
			}
		})
	})


	//Show more salons
	$('.show_more_salon').click(function(){
		$('.loading_button_a').show();
		$('.show_more_salon').hide();
		var last_id = $('.offers_salon').last().attr('data-id');
		var lang = $('#language').attr('data-lang');
		$.ajax({
			type:"get",
			url:'/'+lang+'/user/show-more-salon/'+last_id,      
			success: function(data)
			{
				if(data.status="success" && data.resource != ''){
					$('.catalog_list').append(data.resource);
					$('.loading_button_a').hide(); 
					//$('.show_more_salon').show();    
					$('.show_more_salon').hide();    
				}else{
					$('.loading_button_a').hide();
					$('.show_more_salon').hide(1000);
				}       
			}
		})
	})

	$(document).on('click','.show_more_salon1',function(){
		$('.loading_button_a1').show();
		$('.show_more_salon1').hide();
		var show_button = $(this);
		var last_id = $('.offers_salon').last().attr('data-id');
		var lang = $('#language').attr('data-lang');
		$.ajax({
			type:"get",
			url:'/'+lang+'/user/show-more-salon/'+last_id,      
			success: function(data)
			{
				if(data.status="success" && data.resource != ''){
					$('.catalog_list').append(data.resource);
					$('.loading_button_a1').hide(); 
					$('.show_more_salon1').show();
					show_button.hide()    
					//$('.show_more_salon').hide();    
				}else{
					show_button.hide()
					$('.loading_button_a1').hide();
					$('.show_more_salon1').hide(1000);
				}       
			}
		})
	})


	//end show more salon

	$('.show_more_review').click(function(){
		$('.loading_review').show();
		$('.show_more_review').hide();
		var last_id = $('.user_reviews').last().attr('data-id');
		var lang = $('#language').attr('data-lang');
		$.ajax({
			type:"get",
			url:'/'+lang+'/user/show-more-review/'+last_id,      
			success: function(data)
			{   
				if(data == 1){
					$('.show_more_review').hide();
					$('.loading_review').hide(); 
				}else{
					if(data.status="success" && data.resource != ''){
						$('.rev').append(data.resource);
						$('.show_more_review').hide()
						 $('.loading_review').hide(); 
						 // $('.show_more_review').show();    
					}else{
						$('.loading_review').hide();
						$('.show_more_review').hide(1000);
					} 
				}
					   
			}
		})
	})
	
	$(document).on('click','.show_more_review1',function(){
		$('.loading_review').show();
		$('.show_more_review1').hide();
		var last_id = $('.user_reviews').last().attr('data-id');
		var lang = $('#language').attr('data-lang');

		var button = $(this)
		$.ajax({
			type:"get",
			url:'/'+lang+'/user/show-more-review/'+last_id,      
			success: function(data)
			{   
					if(data.status="success" && data.resource != ''){
						button.hide();
						$('.rev').append(data.resource);
						
						$('.loading_review').hide(); 
						//$('.show_more_review1').show();    
					}else{
					   button.hide();
						$('.loading_review').hide();
						//$('.show_more_review1').hide(1000);
					} 
  
			}
		})
	})

	//Social login Facbook
	$('#facebook_icon').click(function(){
		var lang = $('#language').attr('data-lang');
		var url = '/'+lang+'/user/facebook-login';
		var width = 500;
		var height = 500;
		var left = (screen.width/2) - (width/2);
		var top = (screen.height/2) - (height/2);
		var facebookWindow = window.open(url , 'Connect facebook account', 'height='+height+',width='+width+',top='+top+',left='+left);
		var interval = setInterval(function(){
			try{
				if(facebookWindow.success == 'success'){
					clearInterval(interval);
					window.location.assign('/'+lang+'/user/home');
				}
				if(facebookWindow.success == 'error'){
				}
			} catch(err){}},1000)
	})

	//Social login google
	$('#google_icon').click(function(){
		var lang = $('#language').attr('data-lang');
		var url = '/'+lang+'/user/google-login';
		var width = 500;
		var height = 500;
		var left = (screen.width/2) - (width/2);
		var top = (screen.height/2) - (height/2);
		var facebookWindow = window.open(url , 'Connect facebook account', 'height='+height+',width='+width+',top='+top+',left='+left);
		var interval = setInterval(function(){
			try{
				if(facebookWindow.success == 'success'){
					clearInterval(interval);
					window.location.assign('/'+lang+'/user/home');
				}
				if(facebookWindow.success == 'error'){
					alert('error')
				}
			} catch(err){}},1000)
	})

	//User Registration
	$('.registration').click(function(){
		var firstname = $('.firstname').val();

		var lastname = $('.lastname').val();
		var email = $('.email').val();
		var password = $('.password').val();
		var password_confirmation = $('.password_confirmation').val();
		var token = $('.reg_token').attr('data-token');
		if(firstname == ''){
			$('.firstname').css('border','1px solid red');
		}else{
			$('.firstname').css('border','1px solid #D6D6D6');
		}
		if(lastname == ''){
			$('.lastname').css('border','1px solid red');
		}else{
			$('.lastname').css('border','1px solid #D6D6D6');
		}
		if(email == ''){
			$('.email').css('border','1px solid red');
		}else{
			$('.email').css('border','1px solid #D6D6D6');
		}
		if(password == ''){
			$('.password').css('border','1px solid red');
		}else{
			$('.password').css('border','1px solid #D6D6D6');
		}
		if(password_confirmation == ''){
			$('.password_confirmation').css('border','1px solid red');
		}else{
			$('.password_confirmation').css('border','1px solid #D6D6D6');
		}
		if(password != password_confirmation || password == ''){
			$('.password').css('border','1px solid red');
			$('.password_confirmation').css('border','1px solid red');
		}else{
			var lang = $('#language').attr('data-lang');
			//$('.registration').attr('disabled','disabled');
			$.ajax({
				type:"post",
				url:'/'+lang+'/user/registration',
				data:{_token:token,firstname:firstname,lastname:lastname,email:email,password:password,password_confirmation:password_confirmation},      
				success: function(data)
				{           
					if(data.status == '200'){
						$('.firstname').val('');
						$('.lastname').val('');
						$('.email').val('');
						$('.password').val('');
						$('.password_confirmation').val('');                        
						$('.message_success').html(window.trans('please_echeck_your_email_address'));
						$('#registration').modal('hide');
						$('#success_message').modal('show');
						//location.reload()
						//window.setTimeout(function(){location.reload()},2000) 
					}else if(data.status == 'false'){
						$('.registration').removeAttr("disabled");
						$('.message_error').text('');
						for(error in data.error){
							console.log(data.error) 
							$('.message_error').append(data.error[error]+"<br>");
						}
					}     
				}
			})
		}
	})

	//registration review
	$('.registration_review').click(function(){
		var firstname = $('.review_firstname').val();
		var lastname = $('.review_lastname').val();
		var email = $('.review_email').val();
		var password = $('.review_password').val();
		var password_confirmation = $('.review_password_confirmation').val();

		var token = $('.reg_token').attr('data-token');

		if(firstname == ''){
			$('.review_firstname').css('border','1px solid red');
		}else{
			$('.review_firstname').css('border','1px solid #D6D6D6');
		}
		if(lastname == ''){
			$('.review_lastname').css('border','1px solid red');
		}else{
			$('.review_lastname').css('border','1px solid #D6D6D6');
		}
		if(email == ''){
			$('.review_email').css('border','1px solid red');
		}else{
			$('.review_email').css('border','1px solid #D6D6D6');
		}
		if(password == ''){
			$('.review_password').css('border','1px solid red');
		}else{
			$('.review_password').css('border','1px solid #D6D6D6');
		}
		if(password_confirmation == ''){
			$('.review_password_confirmation').css('border','1px solid red');
		}else{
			$('.review_password_confirmation').css('border','1px solid #D6D6D6');
		}
		if(password != password_confirmation || password == ''){
			$('.review_password').css('border','1px solid red');
			$('.review_password_confirmation').css('border','1px solid red');
		}else{
			var lang = $('#language').attr('data-lang');
			//$('.registration').attr('disabled','disabled');
			$.ajax({
				type:"post",
				url:'/'+lang+'/user/registration',
				data:{_token:token,firstname:firstname,lastname:lastname,email:email,password:password,password_confirmation:password_confirmation},      
				success: function(data)
				{           
					if(data.status == '200'){
						$('.review_firstname').val('');
						$('.review_lastname').val('');
						$('.review_email').val('');
						$('.review_password').val('');
						$('.review_password_confirmation').val('');                        
						$('.message_success').html(window.trans('please_echeck_your_email_address'));
						$('#registration_review').modal('hide');
						$('#logina').modal('hide');
						
						$('#success_message').modal('show');

						setTimeout(function(){
							location.reload()
						},2000)
						//location.reload()
						//window.setTimeout(function(){location.reload()},2000) 
					}else if(data.status == 'false'){
						$('.registration_review').removeAttr("disabled");
						$('.message_error').text('');
						for(error in data.error){ 
							$('.message_error').append(data.error[error]+"<br>");
						}
					}     
				}
			})
		}
	})
	//end registration review

	//User Login
	$('.loginUser').click(function(){
		$('.message_error_login').html('');
		var email = $('.login_email').val();
		var password = $('.login_password').val();
		var token = $(this).attr('content');
		//var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		// if(email == '' || !emailReg.test(email)){
		//     $('.login_email').css('border','1px solid red');
		// }else{
		//     $('.login_email').css('border','1px solid #D6D6D6');
		// }
		if(email == ''){
			$('.login_email').css('border','1px solid red');
		}else{
			$('.login_email').css('border','1px solid #D6D6D6');
		}
		if(password == ''){
			$('.login_password').css('border','1px solid red');
		}else{
			$('.login_password').css('border','1px solid #D6D6D6');
		}
		if(email != '' && email != '' && password != ''){
			var lang = $('#language').attr('data-lang');
			$.ajax({
				type:"post",
				url:'/'+lang+'/user/login',
				data:{_token:token,email:email,password:password},
				success:function(data){
					if(data.error == 'success'){
						window.location.assign('/'+lang+'/user/home');
					}else if(data.error == 'error'){
						$('.login_email').css('border','1px solid #D6D6D6');
						$('.login_password').css('border','1px solid #D6D6D6');
						$('.message_error_login').html('');
						$('.message_error_login').html(data.text);
					}
				}
			})
		}
	})


	$('.login_password').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			$('.loginUser').trigger('click');
		}
	});


	//User Registration Is Salon

	// $('.salon_prof_image').change(salonProfilePictures)

	// function salonProfilePictures(event)
	// {
	//     window.files = event.target.files;
	//     event.stopPropagation(); 
	//     event.preventDefault();
	//     var data = new FormData();
	//     var token = $('.token').attr('alt');
	//     var lang = $('#language').attr('data-lang');
	//     data.append('file', files[0]);
	//     data.append('_token',token);
	//     $.ajax({
	//         url: '/'+lang+'/user/add-profile-pictures',
	//         type: 'post',
	//         data: data,
	//         cache: false,
	//         dataType: 'json',
	//         processData: false, 
	//         contentType: false, 
	//         cache: false,
	//         dataType: 'json',
	//         processData: false, 
	//         contentType: false, 
	//         success: function(data)
	//         {                     
	//             var img_name = data.name;
	//             var img_path = "/assets/uploads/"+img_name+""
	//             $('.salon_image').attr('src',img_path);
	//         }
	//     });
	// }


	$('.reg_salon').click(function(event){
		if(typeof files != 'undefined'){
			var data = new FormData();
			var name = $('.salon_name').val();
			var firstname = $('.admin_name').val();
			var sub_domain = $('.sub_domain').val();
			var email = $('.email_salon').val();
			var password = $('.password_salon').val();
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var token = $(this).attr('content');
			data.append('name',name);
			data.append('firstname',firstname);
			data.append('sub_domain',sub_domain);
			data.append('email',email);
			data.append('password',password);
			data.append('file', files[0]);
			data.append('_token',token);
			if(name == ''){
				$('.salon_name').css('border','1px solid red');
			}else{
				$('.salon_name').css('border','1px solid #D6D6D6');
			}
			if(firstname == ''){
				$('.admin_name').css('border','1px solid red');
			}else{
				$('.admin_name').css('border','1px solid #D6D6D6');
			}
			if(sub_domain == ''){
				$('.sub_domain').css('border','1px solid red');
			}else{
				$('.sub_domain').css('border','1px solid #D6D6D6');
			}
			if(email == '' || !emailReg.test(email)){
				$('.email_salon').css('border','1px solid red');
			}else{
				$('.email_salon').css('border','1px solid #D6D6D6');
			} 
			if(password == ''){
				$('.password_salon').css('border','1px solid red');
			}else{
				$('.reg_salon').attr('disabled','disabled');
				var lang = $('#language').attr('data-lang');
				$.ajax({
					type:"post",
					url:'/'+lang+'/user/user-add-is-salon',
						data: data,
						cache: false,
						dataType: 'json',
						processData: false, 
						contentType: false, 
						cache: false,
						dataType: 'json',
						processData: false, 
						contentType: false,
						success:function(data){
							if(data.status == 'success'){
								$('.salon_name').val('');
								$('.admin_name').val('');
								$('.sub_domain').val('');
								$('.email_salon').val('');
								$('.password_salon').val('');
								
								$('#registration').modal('hide');
								$('.message_success').html(window.trans('please_echeck_your_email_address'));
								$('#success_message').modal('show');
								window.setTimeout(function(){location.reload()},2000) 
							}else if(data.status == 'false'){
								$('.reg_salon').removeAttr("disabled");
								$('.message_error').text('');
								for(error in data.error){
									$('.message_error').append(data.error[error]+"<br>");
								}
							}
						}
				})
			}
		}else{
			var name = $('.salon_name').val();
			var firstname = $('.admin_name').val();
			var sub_domain = $('.sub_domain').val();
			var email = $('.email_salon').val();
			var password = $('.password_salon').val();
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var token = $(this).attr('content');
			if(name == ''){
				$('.salon_name').css('border','1px solid red');
			}else{
				$('.salon_name').css('border','1px solid #D6D6D6');
			}
			if(firstname == ''){
				$('.admin_name').css('border','1px solid red');
			}else{
				$('.admin_name').css('border','1px solid #D6D6D6');
			}
			if(sub_domain == ''){
				$('.sub_domain').css('border','1px solid red');
			}else{
				$('.sub_domain').css('border','1px solid #D6D6D6');
			}
			if(email == '' || !emailReg.test(email)){
				$('.email_salon').css('border','1px solid red');
			}else{
				$('.email_salon').css('border','1px solid #D6D6D6');
			} 
			if(password == ''){
				$('.password_salon').css('border','1px solid red');
			}else{
				$('.reg_salon').attr('disabled','disabled');
				var lang = $('#language').attr('data-lang');
				$.ajax({
					type:"post",
					url:'/'+lang+'/user/user-add-is-salon',
					data:{_token:token,email:email,name:name,firstname:firstname,sub_domain:sub_domain,password:password},
					success:function(data){
						if(data.status == 'success'){
							$('.salon_name').val('');
							$('.admin_name').val('');
							$('.sub_domain').val('');
							$('.email_salon').val('');
							$('.password_salon').val('');

							$('#registration').modal('hide');
							$('.message_success').html(window.trans('please_echeck_your_email_address'));
							$('#success_message').modal('show');
							window.setTimeout(function(){location.reload()},2000)
						}else if(data.status == 'false'){
							$('.reg_salon').removeAttr("disabled");
							$('.message_error').text('');
							for(error in data.error){
								$('.message_error').append(data.error[error]+"<br>");
							}
						}
					}
				})
			}    
		}
	})


	// open map inteval
	$(document).on('click','#user_map',function(){
		setTimeout(function(){ 
			initAutocomplete()
		}, 50);
	})
	// end open map interval


	$('.scroll_review_a').click(function(){
		$('html, body').animate({
		   scrollTop: $("#review").offset().top
		}, 1000);  
	});  


	//salon rateing
	$('.salon_raiting').click(function(){
		salon_id = $('.salon_id').attr('data-salon-id');
		token = $('.salon_id').attr('content');
		var lang = $('#language').attr('data-lang');
		var value = $(this).children().attr('title');
		$.ajax({
			url: '/'+lang+'/user/raiting-salon',
			type:"post",
			data:{_token:token,raiting:value,salon_id:salon_id},
			success:function(data){
				$('.star_raiting_block').hide(2000);
			}
		})
	})
	//end salon rating

	//add review
	$('#add_review').click(function(){
		var lang = $('#language').attr('data-lang');
		var message = $('#review_text').val();
		var salon_id = $(this).attr('data-salonid');
		var token = $(this).attr('content');
		html = ''
		var review_count = $('.review_count').text();
		var review_result_count  = parseInt(review_count)+1
		

		if(message == ""){
			$('#review_text').css('border','1px solid red')
		}else{
			$('#review_text').css('border','1px solid #ccc')
		   $.ajax({
				type:"post",
				url:'/'+lang+'/user/send-review-salon',
				data:{_token:token,salon_id:salon_id,message:message},
				success: function(param)
				{  
					$('.mes').val('');
					if(param['status']=='success'){
						$('.review_count').text(review_result_count);
						$('.rev').prepend(param.resource);
					} 
					$('html, body').animate({
						scrollTop: $(".last_review").offset().top
					}, 1000);        
				}
			}) 
		}
		
	})
	//end add review

	//select category service
	$('.salon_category_services').click(function(){
		$( ".modal_body_services" ).empty();
		var id = $(this).data('id');
		var token = $('#tok').attr('data');
		var lang = $('#language').attr('data-lang');
		$.ajax({
			url: '/'+lang+'/user/one-category-services',
			type: "post",
			data: {_token: token,category_id: id},
			success: function (data) {
				$html = '<div class="servise_open_block">';
				if(data != ''){
					$.each(data, function(i, item){
						$html += '<div>';
						$html += '<p  class="modal_service">'+item.salon_category_service[0].services;
						$html += '</p>';
						$html += '<p class="modal_price">'+ item.salon_category_service[0].service_prices_min+'&nbsp'+'AMD'+' - '+item.salon_category_service[0].service_prices_max+'&nbsp'+'AMD';
						if(item.salon_category_service[0].discount){
							$html += '&nbsp&nbsp&nbsp' + '<span style=color:red>' + item.salon_category_service[0].discount + '%' +  '&nbsp&nbspoff</span>'
						}
						$html += '</p>';
						$html += '</div>';  
					});
				}else{ 
					$html += '<div>';
					$html += '<p  class="modal_service">'+window.trans('not_services');
					$html += '</p>';
					$html += '</div>';
				}
				$html += '</div>';

				$(".modal_body_services" ).html($html);

				$('.servise_open_block').animate({
					height: '163px'
				},1000);

				
				
			}
		});
	})
	//end select category service

	$(document).on('click','.edit_user_rew',function(){
		$(this).prev().prev().css('display','none')
		$(this).css('display','none')
		$(this).prev().css('display','block')
		$(this).prev().trigger('focus')
		$(this).next().css('display','block')
	})



	//edit user review
	$(document).on('click','.update_user_review',function(){
		var message = $(this).prev().prev().val();
		var lang = $('#language').attr('data-lang');
		var id = $(this).attr('data-id');
		var token = $(this).attr('content');
		var its = $(this);
		var edit_icon = $(this).prev();
		var textarea = $(this).prev().prev();
		var text_span = $(this).prev().prev().prev();
		if(message == ''){
			$(this).prev().prev().css('border','1px solid red')
		}else{
			$.ajax({
				type:"post",
				url:'/'+lang+'/user/edit-salon-revie',
				data:{_token:token,id:id,message:message},
				success: function(param)
				{  
					textarea.css('display','none');
					edit_icon.css('display','block');
					its.css('display','none');
					text_span.css('display','block');
					text_span.text(param.message);  
				}
			})
		}
	})
	//end edit user review 


	//Delete user review
	$(document).on('click','.delete_review',function(){
		var id = $(this).attr('data-id');
		var lang = $('#language').attr('data-lang');
		var row = $(this).parent().parent().parent().parent().parent().parent().parent();
		var review_count = $('.review_count').text();
		var review_result_count  = parseInt(review_count)-1
		$.ajax({
			type:"get",
			url:'/'+lang+'/user/delete-salon-review/' + id,
			success: function(param)
			{  
				$('.review_count').text(review_result_count);
				row.fadeOut(1000,function(){
					row.remove();
				});
			}   
		})

	})
	//end Delete user review

	//Login review
	$('.login_review').click(function(){
		$('.message_error_login').html('');
		var email = $('.login_email_rev').val();
		var password = $('.login_review_password_rev').val();

		var token = $(this).attr('content');
		//var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		var salon_id = $(this).attr('data-salonid');
		var message = $('#review_text').val()
		var lang = $('#language').attr('data-lang');

		if(email == ''){
			$('.login_email_rev').css('border','1px solid red');
		}else{
			$('.login_email_rev').css('border','1px solid #D6D6D6');
		}
		if(password == ''){
			$('.login_review_password_rev').css('border','1px solid red');
		}else{
			$('.login_review_password_rev').css('border','1px solid #D6D6D6');
		}
		if(email != '' && password != ''){            
			$.ajax({
				type:"post",
				url:'/'+lang+'/user/review-login',
				data:{_token:token,email:email,password:password},
				success:function(data){
					if(data.error == 'success'){ 
						if(message != ''){
							 $.ajax({
								type:"post",
								url:'/'+lang+'/user/send-review-salon',
								data:{_token:token,salon_id:salon_id,message:message},
								success: function(param)
								{               
									location.reload(); 
								}
							})
						}else{
							location.reload(); 
						}
					}else if(data.error == 'error'){
						$('.login_email').css('border','1px solid #D6D6D6');
						$('.login_password').css('border','1px solid #D6D6D6');
						$('.message_error_login').html('');
						 $('.message_error_login').html(data.text);
					}
				}
			})
		}

	})
   //end login review

	

	//search
	$('.search_salons_function').click(function(){
		var lang = $('#language').attr('data-lang');
		var token = $(this).attr('content');
		var salons_id = $(".salons_select").val();

		var position_id = $(".position_select").val();
		var category_id = $(".category_select").val();
		var max_price = $(".search_max").val();
		var min_price = $(".search_min").val();
		var position_select = $('.position').val();


		if(salons_id == '' && category_id == '' && max_price == '' && min_price == '' && position_select ==''){
			$('.search_error').css('display','block')
			$('.search_error').text('Please select one row');
		}else{
			$('.search_error').css('display','none')
			$.ajax({
				type:"post",
				url:'/'+lang+'/user/search',
				data:{_token:token,salons_id:salons_id,position_id:position_id,category_id:category_id,max_price:max_price,min_price:min_price,position:position_select},
				success: function(param)
				{  
					if(param.status == "200"){
						$('.serach_result').html(param.resource);
						$('html, body').animate({
							scrollTop: $(".serach_result").offset().top
						}, 1000); 
					}else if(param.status == "500"){
						$('.serach_result').html("<center><h1>Not result</h1></center>");
						$('html, body').animate({
							scrollTop: $(".serach_result").offset().top
						}, 1000); 
					}             
				}
			})
		}
		
	})
	//end search




$(document).on('click','.chosen-results li',function(){

	 // $(this).children().removeClass('active-result')
	 // $(this).children().removeClass('result-selected')
	$(this).addClass('highlighted');
	window.text = $(this).text();
	
})

$(document).on('click','.chosen-container',function(){
	if(text == 'Salon'){
		$(this).children(':nth-child(2)').children(':nth-child(2)').children(':nth-child(1)').removeClass('highlighted');
		$(this).children(':nth-child(2)').children(':nth-child(2)').children(':nth-child(2)').addClass('highlighted');
	}else if(text == 'User'){
		$(this).children(':nth-child(2)').children(':nth-child(2)').children(':nth-child(2)').removeClass('highlighted');
		$(this).children(':nth-child(2)').children(':nth-child(2)').children(':nth-child(1)').addClass('highlighted');
	}else if(text == 'Mobile Phone' || text == 'Բջջային Հեռախոս' || text == 'Мобильный Телефон'){
		$(this).children(':nth-child(2)').children(':nth-child(2)').children(':nth-child(1)').removeClass('highlighted');
		$(this).children(':nth-child(2)').children(':nth-child(2)').children(':nth-child(2)').addClass('highlighted');
	}else if(text == 'Эл. адрес' || text == 'Email' ||  text == 'էլ - փոստ'){
		$(this).children(':nth-child(2)').children(':nth-child(2)').children(':nth-child(2)').removeClass('highlighted');
		$(this).children(':nth-child(2)').children(':nth-child(2)').children(':nth-child(1)').addClass('highlighted');
	}


})

//change user profile pic
$('.profile_pikcures').click(function(){
	$('.img_prof').trigger('click');
})


$('.img_prof').on('change',uploadUserImg);    

//end change user profile pic




})




//change user profile pic funcftion
function uploadUserImg(event)
{
	files = event.target.files;
	event.stopPropagation(); 
	event.preventDefault();
	var data = new FormData();
	var token = $('.ss').attr('data');
	data.append('file', files[0]);
	data.append('_token',token);
	var lang = $('#language').attr('data-lang');
	$.ajax({
		url: '/'+lang+'/user/ajax-add-photo',
		type: 'post',
		data: data,
		cache: false,
		dataType: 'json',
		processData: false, 
		contentType: false, 
		cache: false,
		dataType: 'json',
		processData: false, 
		contentType: false, 
		success: function(data)
		{                     
			var img_name = data.name;
			var img_path = "/assets/user/user_images/"+img_name+""
			$('.profile_pikcures').attr('src',img_path);
			// $('.profile_img_submit').css('display','block')
			var pic = $('.profile_img_submit').prev().attr('src');
			$.ajax({
				url:'/'+lang+'/user/edit-profile-pictures',
				type:"post",
				data:{_token:token,pictures:pic},
				success: function(data)
				{                     
					$('.profile_img_submit').css('display','none')
				}
			})
		}
	});   
}





//google map
function initAutocomplete() {
	var latLngs =  $('.lat').attr('data-lat');
	var  latLngsArray= JSON.parse(latLngs)
	var map = new google.maps.Map(document.getElementById('map'), {
		//center: {lat: lat , lng: lng},
		center: new google.maps.LatLng(parseFloat(latLngsArray[0].lat), parseFloat(latLngsArray[0].lng)),
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		zoom: 10,
	});
	var locations = [];
	$.each(latLngsArray, function(j,item){
		locations.push([parseFloat(item.lat), parseFloat(item.lng)])
	});
	var marker, i;

	for (i = 0; i < locations.length; i++) {  
	  marker = new google.maps.Marker({
	    position: new google.maps.LatLng(locations[i][0], locations[i][1]),
	    map: map
	  });
	}

}
//end google map  
