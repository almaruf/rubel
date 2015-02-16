$(document).ready(function(){
	$('#nav').slicknav();
	
	jQuery(function(){
		jQuery('#camera_wrap_2').camera({
			height: '500px',
			loader: 'bar',
			pagination: false,
			thumbnails: false,
			barPosition: 'top',
			fx: 'scrollLeft',
			loaderBgColor: '',
			loaderStroke: 10,
			hover: false
		});
	});
});
