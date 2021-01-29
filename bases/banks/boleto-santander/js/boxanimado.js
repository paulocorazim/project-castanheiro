$(function() {
	$('.temphol').hover(function() {
		$(this).children('.front').stop().animate({ "top" : '116px'}, 500);   
	}, function() {
		$(this).children('.front').stop().animate({ "top" : '0px'}, 300);       
	});
});