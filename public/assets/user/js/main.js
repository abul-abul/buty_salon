$(document).ready(function(){

    //$('.profile_img_worker_submit').hide();


	$('.work_pikcures').click(function(){
		$('.work_pic_file').trigger('click');
	})

	// $('.profile_pikcures').click(function(){
	// 	$('.img_prof').trigger('click');
	// })





 //    $('.img_prof').on('change',uploadUserImg);    

 //    function uploadUserImg(event)
 //    {
 //        files = event.target.files;
 //        event.stopPropagation(); 
 //        event.preventDefault();
 //        var data = new FormData();
 //        var token = $('.ss').attr('data');
 //        data.append('file', files[0]);
 //        data.append('_token',token);
 //        var lang = $('#language').attr('data-lang');
 //        $.ajax({
 //            url: '/'+lang+'/user/ajax-add-photo',
 //            type: 'post',
 //            data: data,
 //            cache: false,
 //            dataType: 'json',
 //            processData: false, 
 //            contentType: false, 
 //            cache: false,
 //            dataType: 'json',
 //            processData: false, 
 //            contentType: false, 
 //            success: function(data)
 //            {                     
 //                var img_name = data.name;
 //                var img_path = "/assets/user/user_images/"+img_name+""
 //                $('.profile_pikcures').attr('src',img_path);
 //                // $('.profile_img_submit').css('display','block')
 //                var pic = $('.profile_img_submit').prev().attr('src');
 //                $.ajax({
 //                    url:'/'+lang+'/user/edit-profile-pictures',
 //                    type:"post",
 //                    data:{_token:token,pictures:pic},
 //                    success: function(data)
 //                    {                     
 //                        $('.profile_img_submit').css('display','none')
 //                    }
 //                })
 //            }
 //        });   
 //    }

    // $('.profile_img_submit').click(function(){
    //     var pic = $(this).prev().attr('src');
    //     var token = $('.ss').attr('data');
    //     var lang = $('#language').attr('data-lang');
    //     $.ajax({
    //         url:'/'+lang+'/user/edit-profile-pictures',
    //         type:"post",
    //         data:{_token:token,pictures:pic},
    //         success: function(data)
    //         {                     
    //             $('.profile_img_submit').css('display','none')
    //         }
    //     })
    // })

    $('.profile_worker_pikcures').click(function(){
        $('.img_worker_prof').trigger('click');
    })

	$('.img_worker_prof').on('change',uploadWorkerImg);

	function uploadWorkerImg(event)
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
				var img_path = "/assets/salon-worker/"+img_name+""
				$('.profile_worker_pikcures').attr('src',img_path);
				$('.profile_img_worker_submit').css('display','block')
			}
        });
    }

    $('.profile_img_worker_submit').click(function(){
    	var pic = $(this).prev().attr('src');
    	var token = $('.ss').attr('data');
        var lang = $('#language').attr('data-lang');
    	$.ajax({
    		url:'/'+lang+'edit-profile-pictures',
    		type:"post",
    		data:{_token:token,pictures:pic},
    		success: function(data)
			{                     
				$('.profile_img_worker_submit').css('display','none')
			}
    	})
    })

    $('.profile_picture_img').click(function(){
        $('.profile_picture').trigger('click')
    })

    $('.profile_picture').on('change',profileImg);

    function profileImg(event)
    {
        files = event.target.files;
        event.stopPropagation(); 
        event.preventDefault();
        var data = new FormData();
        var token = $('.tok').attr('alt');
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
                var img_path = "/assets/uploads/"+img_name+""
                $('.profile_picture_img').attr('src',img_path);
            }
        });
    }

    // Salon Rating
    // $('.salon_raiting').rating({ 
    //     callback: function(value, link){
    //         salon_id = $('.salon_id').attr('data-salon-id');
    //         token = $('.salon_id').attr('content');
    //         var lang = $('#language').attr('data-lang');
    //         $.ajax({
    //             url: '/'+lang+'/user/raiting-salon',
    //             type:"post",
    //             data:{_token:token,raiting:value,salon_id:salon_id},
    //             success:function(data){
    //                 $('.star_raiting_block').hide(2000);
    //             }
    //         })
    //     }
    // });

    //Service Raiting
    // $('.service_raiting').rating({
    //     callback: function(value, link){
    //         salon_id = $('.salon_id').attr('data-salon-id');
    //         token = $('.salon_id').attr('content');
    //         service_id = $('.salon_id').attr('data-service-id');
    //         var lang = $('#language').attr('data-lang');
    //         $.ajax({
    //             url: '/'+lang+'/user/raiting-service',
    //             type:"post",
    //             data:{_token:token,raiting:value,salon_id:salon_id,service_id:service_id},
    //             success:function(data){

    //             }
    //         })
    //     }
    // });

    //worker Raiting
    // $('.salon_raiting_service').rating({
    //     callback: function(value, link){
    //         salon_id = $('.worker_rate').attr('data-salon-id');
    //         service_id = $('.worker_rate').attr('data-service-id');
    //         worker_id = $('.worker_rate').attr('data-worker-id');
    //         token = $('.worker_rate').attr('content');
    //         var lang = $('#language').attr('data-lang');
    //         $.ajax({
    //             url: '/'+lang+'/user/raiting-worker',
    //             type:"post",
    //             data:{_token:token,raiting:value,salon_id:salon_id,service_id:service_id,worker_id:worker_id},
    //             success:function(data){

    //             }
    //         })
    //     }
    // });    

    $('.profile_reg_picture_img').click(function(){
        $('.profile_reg_picture').trigger('click')
    })

    $('.profile_reg_picture').change(userProfilePictures)

    function userProfilePictures(event)
    {
        files = event.target.files;
        event.stopPropagation(); 
        event.preventDefault();
        var data = new FormData();
        var token = $('.tok').attr('alt');
        data.append('file', files[0]);
        data.append('_token',token);
        var lang = $('#language').attr('data-lang');
        $.ajax({
            url: '/'+lang+'/user/add-profile-pictures',
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
                var img_path = "/assets/uploads/"+img_name+""
                $('.profile_reg_picture_img').attr('src',img_path);
            }
        });
    }
    $('.salon_image').click(function(){
        $('.salon_prof_image').trigger('click')
    })


    // //search
    // $('.search_salons_function').click(function(){
    //     var lang = $('#language').attr('data-lang');
    //     var token = $(this).attr('content');
    //     var salons_id = $(".salons_select").val();

    //     var position_id = $(".position_select").val();
    //     var category_id = $(".category_select").val();
    //     var max_price = $(".search_max").val();
    //     var min_price = $(".search_min").val();

    //     if(salons_id == '' && category_id == '' && max_price == '' && min_price == ''){
    //         $('.search_error').css('display','block')
    //         $('.search_error').text('Please select one row');
    //     }else{
    //         $('.search_error').css('display','none')
    //         $.ajax({
    //             type:"post",
    //             url:'/'+lang+'/user/search',
    //             data:{_token:token,salons_id:salons_id,position_id:position_id,category_id:category_id,max_price:max_price,min_price:min_price},
    //             success: function(param)
    //             {  
    //                 if(param.status == "200"){
    //                     $('.serach_result').html(param.resource);
    //                     $('html, body').animate({
    //                         scrollTop: $(".serach_result").offset().top
    //                     }, 1000); 
    //                 }else if(param.status == "500"){
    //                     $('.serach_result').html("<center><h1>Not result</h1></center>");
    //                     $('html, body').animate({
    //                         scrollTop: $(".serach_result").offset().top
    //                     }, 1000); 
    //                 }             
    //             }
    //         })
    //     }
        
    // })



    




})


   
