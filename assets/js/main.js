(function($) {
    "use strict";
     $(document).on('ready', function() {
	
        jQuery(window).on('scroll', function() {
			if ($(this).scrollTop() > 200) {
				$('#header .header-inner').addClass("sticky");
			} else {
				$('#header .header-inner').removeClass("sticky");
			}
		});
		
		jQuery(window).on('scroll', function() {
			if ($(this).scrollTop() > 100) {
				$('.header').addClass("sticky");
			} else {
				$('.header').removeClass("sticky");
			}
		});
		
		$('.pro-features .get-pro').on( "click", function(){
			$('.pro-features').toggleClass('active');
		});
		
		$('.menu').slicknav({
			prependTo:".mobile-nav",
			duration: 300,
			closeOnClick:true,
		});
		
		$(".hero-slider").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:3500,
			singleItem: true,
			autoplayHoverPause:true,
			items:1,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			dots:false,
		});
		
		$('.counter').counterUp({
			delay:20,
			time:2000
		});
		
		$('.accordion > li:eq(0) a').addClass('active').next().slideDown();
		$('.accordion a').on('click', function(j) {
			var dropDown = $(this).closest('li').find('p');
			$(this).closest('.accordion').find('p').not(dropDown).slideUp(300);
			if ($(this).hasClass('active')) {
				$(this).removeClass('active');
			} else {
				$(this).closest('.accordion').find('a.active').removeClass('active');
				$(this).addClass('active');
			}
			dropDown.stop(false, true).slideToggle(300);
			j.preventDefault();
		});
		
		$('select').niceSelect();
	
		$('input[type="checkbox"]').change(function(){
			if($(this).is(':checked')){
				$(this).parent("label").addClass("checked");
			} else {
				$(this).parent("label").removeClass("checked");
			}
		});

		$('.right-bar .bar').on( "click", function(){
			$('.sidebar-menu').addClass('active');
		});
		$('.sidebar-menu .cross').on( "click", function(){
			$('.sidebar-menu').removeClass('active');
		});
		
		$('.video-popup').magnificPopup({
			type: 'video',	
		});
			
		var window_width = $(window).width();   
			if(window_width > 767){
            new WOW().init();
		}
	
		$.scrollUp({
			scrollText: '<span><i class="fa fa-angle-up"></i></span>',
			easingType: 'easeInOutExpo',
			scrollSpeed: 900,
			animation: 'fade'
		}); 

		$('.scroll').on("click", function (e) {
			var anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $(anchor.attr('href')).offset().top - 100
				}, 1000);
			e.preventDefault();
		});

		$.stellar({
		  horizontalOffset: 0,
		  verticalOffset: 0
		});
	});
})(jQuery);
