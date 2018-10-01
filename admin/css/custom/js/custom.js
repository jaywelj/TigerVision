 "use strict";
 
 
 
//jQuery(document).ready(function($){


	function onScrollInit( items, trigger ) {
		items.each( function() {
					var osElement = $(this),
					osAnimationClass = osElement.attr('data-os-animation'),
					osAnimationDelay = osElement.attr('data-os-animation-delay');
					var osTrigger = ( trigger ) ? trigger : osElement;
					osTrigger.waypoint(function() {
						osElement.addClass('animated').addClass(osAnimationClass);
					},{
						triggerOnce: true,
						offset: '100%'
					});  
		});
}
 
jQuery(document).ready(function($){
 
 	onScrollInit( $('.os-animation') );
 	
	$(window).load(function(){
		 
		$("#pre-loader").fadeOut();
		$("#main_Container").addClass('loaded');
		
		/*----------------------------------
			Floating Menu Function
		--------------------------------------*/
		 
		// To Calc fixing height 
		var Nav_wrapper_height =  jQuery(".about_img").outerHeight();
		// Nav Element
		var nav_bar_element = jQuery('.menu_wrapper');
		 
		 
		 	// Scrolling here
		 	$('.page-scroll a, .page-scroll-button').bind('click', function(event) {
					
					// This
					var $anchor = $(this);
				  	 
					// About me menu is exception because of minus margin image, so let do some extra math for it  
					if(nav_bar_element.hasClass("fixed")){
			
						var scrolltop = $($anchor.attr('href')).offset().top - 50;
					
						if($(this).hasClass('about_me')){
							var scrolltop =  $($anchor.attr('href')).offset().top - 192 ;
						}	
					}
					else{
						
						var scrolltop = $($anchor.attr('href')).offset().top - 136;
						
							if($(this).hasClass('about_me')){
								var scrolltop =  $($anchor.attr('href')).offset().top - 260 ;
							}
						}
			 
			 		// Now Animate it using scrolltop var 
				 	$('html, body').stop().animate({
						scrollTop: scrolltop
					}, 1500, 'easeInOutExpo');
					event.preventDefault();
					
					// Add first remove and then add active class
				 	$(".page-scroll a").each(function(){
							$(this).parent().removeClass("active");
						})
			
						$anchor.parent().addClass("active");
			
			 	});
			 	
				// Add Fixed class to nav on page loading if needed
			 	 if($( window ).scrollTop()>=Nav_wrapper_height)
						{	
							nav_bar_element.addClass("fixed");
						}
						else{
							nav_bar_element.removeClass("fixed");
				 }
				
				// Add fixed class to nav on floating 
			 	$(window).scroll(function() {
				 		if($( window ).scrollTop()>=Nav_wrapper_height)
						{	
							nav_bar_element.addClass("fixed");
						}
						else{
							nav_bar_element.removeClass("fixed");
						}
			 	});
				
	})  
	
 
 })	//================================================= Page Easing end here ============= // 

 
	