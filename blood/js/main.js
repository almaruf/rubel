$(document).ready(function(){
	$('#nav').slicknav();
	$(".fancybox").fancybox();
	
	//add hide on click
	$("p.actn").click(function(){
		$("#hide_add").fadeOut();
	});
});