jQuery(document).ready( function() {
	
	/*
var elem =  jQuery('#infinite-handle').detach();
	jQuery('#main').append(elem);
*/
	
	jQuery('.tribal').tooltipster({
		interactive: true,
		interactiveTolerance: 100,
		speed: 250,
		contentAsHTML: true,
		theme: 'punk',
		position: 'bottom',
		maxWidth: 200,
		delay: 200,
		animation: 'grow'
	});
	
	jQuery("#infinite-handle").click(function() {
		jQuery("span.infinite-loader").addClass("load-inner ball-scale-ripple-multiple");
	});
	
	
	jQuery('.infinite-loader').html(jQuery(".loader").html());
	
	jQuery("#outmenu").addClass('menu-hidden');
	//Animating the Top Menu Bar
	jQuery(".menulink").toggle(
		function() {
			jQuery("#outmenu").slideDown();
			jQuery("#outmenu").addClass('menu-shown');
			jQuery("#outmenu").removeClass('menu-hidden');
			jQuery("i.fa-bars").addClass("fa-remove").removeClass("fa-bars");
			
			
		},
		function() {
			jQuery("#outmenu").addClass('menu-hidden');
			jQuery("#outmenu").removeClass('menu-shown');
			jQuery("#outmenu").slideUp();
			jQuery("i.fa-remove").addClass("fa-bars").removeClass("fa-remove");
		}
	);

	jQuery('.searchlink').click(function() {
		jQuery('#jumtribalarch').fadeIn();
		jQuery('#jumtribalarch input').focus();
	});
	jQuery('#jumtribalarch .closeicon').click(function() {
		jQuery('#jumtribalarch').fadeOut();
	});
	jQuery('body').keydown(function(e){
	    
	    if(e.keyCode == 27){
	        jQuery('#jumtribalarch').fadeOut();
	        
	        if ( jQuery("#outmenu").hasClass('menu-shown') ) {
				jQuery("#outmenu").removeClass('menu-shown');
				jQuery("#outmenu").slideUp();
				jQuery("i.fa-remove").addClass("fa-bars").removeClass("fa-remove");
			}
	        
	    }
	});

});  

// Handle new items appended by infinite scroll
jQuery(document).on('post-load', function() {
	jQuery('.tribal').tooltipster({
		interactive: true,
		interactiveTolerance: 100,
		speed: 250,
		contentAsHTML: true,
		theme: 'punk',
		position: 'bottom',
		maxWidth: 200,
		delay: 200,
		animation: 'grow'
	});
});

jQuery(window).load(function() {
    jQuery('#nivoSlider').nivoSlider({
        prevText: "<i class='fa fa-chevron-circle-left'></i>",
        nextText: "<i class='fa fa-chevron-circle-right'></i>",
        pauseTime: 5000,
        beforeChange: function() {
	    jQuery('.slider-wrapper .nivo-caption').animate({
													opacity: 0,
													},500,'linear');
        },
        afterChange: function() {
	        jQuery('.slider-wrapper .nivo-caption').animate({
													opacity: 1,
													},500,'linear');
        },
        animSpeed: 700,
        
    });
});  
