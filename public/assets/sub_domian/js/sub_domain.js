$(document).ready(function(){
	$(window).scroll(function(){
            
        var scroll = $(window).scrollTop();

        if(scroll > 1550){
            $('.beauty_product_component_count1').animate({ num: 2500 }, {
			    duration: 1200,
			    step: function (num){
			        this.innerHTML = (num + 0).toFixed(0) 
			    }
    		});

    		$('.beauty_product_component_count2').animate({ num: 100 }, {
			    duration: 1200,
			    step: function (num){
			        this.innerHTML = (num + 0).toFixed(0) 
			    }
    		});

    		$('.beauty_product_component_count3').animate({ num: 150 }, {
			    duration: 1200,
			    step: function (num){
			        this.innerHTML = (num + 0).toFixed(0) 
			    }
    		});

    		$('.beauty_product_component_count4').animate({ num: 250 }, {
			    duration: 1200,
			    step: function (num){
			        this.innerHTML = (num + 0).toFixed(0) 
			    }
    		});
    	}	
	})

	
})