$(document).ready(function(){
	$('#nav').slicknav();
	
	var owl = $("#owl-demo");
     
    owl.owlCarousel({
		items : 4, //10 items above 1000px browser width
		itemsDesktop : [1000,3], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,3], // betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0
		itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
		autoPlay: 3000,
		pagination: false
    });
     
    // Custom Navigation Events
    $(".next").click(function(){
    owl.trigger('owl.next');
    })
    $(".prev").click(function(){
    owl.trigger('owl.prev');
    })
    $(".play").click(function(){
    owl.trigger('owl.play',2000); //owl.play event accept autoPlay speed as second parameter
    })
    $(".stop").click(function(){
    owl.trigger('owl.stop');
    })
	
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
