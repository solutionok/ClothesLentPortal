$("#back-to-top").on("click",function(o){o.preventDefault(),$("html,body").animate({scrollTop:0},700)});


$(document).ready(function() {
	$('.messages_popup').magnificPopup({
		type: 'inline',
	});
});

