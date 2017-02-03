$(document).ready(function(){
	$('.delete_salon').click(function(){
		var url = $(this).attr('data-href');
		$('.delete_salon_yes').attr('href',url);
	})
})