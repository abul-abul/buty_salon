$(document).ready(function(){
	$(window).load(function(){
		window["trans"] = function trans(param) { 
			window.language = $('#language').attr('data-lang');
			window.a = data[window.language][param];
			return a;
		};
	})
})