  

/* Responsive navigation
*	jquery.dropdown.js
*	Apply sexy dropdowns on any ul with child ul.
*	Depends on: jquery.hoverIntent.js
*/

$.fn.dropdown = function(options) {

	var defaults = {};
	var opts = $.extend(defaults, options);
	
	// Apply class=hasChildren on those items with children
	this.each(function() {
		$(this).find('li').each(function() {
			if($(this).find("ul").length > 0) {
				$(this).addClass("hasChildren");
				$(this).find('> a').wrapInner("<span></span>");
			}
		});
	});
	
	// Apply class=hover on all list items
	$(this).find("li").on('hover', function() {
		$(this).addClass('hover');
	}, function() {
		$(this).removeClass('hover');
	});
};

/*
*	When the DOM is ready,
*	Let's get cracking.
*/

$(function() {

	// Calling the jquery dropdown
	$('nav').dropdown();
		
	
	/*
	*	Applicable only to Desktop version of the Navigation
	*/
		
		// For IE versions 7 or less, make the navigation appear on hover.
		if ($.browser.msie && $.browser.version.substr(0,1)<7) {
			$('li').has('ul').mouseover(function(){
				$(this).children('ul').show();
			}).mouseout(function(){
				$(this).children('ul').hide();
			});
		}
		
	
	/*
	*	Applicable only to Mobile-nav
	*/
	
		// Checking if the top-right button is visible.
		if ($("nav a.btn-navbar").is(":visible")) {
			
			// Making the dropdown magically appear onclick/touch.
			$('nav a.btn-navbar').on('click', function() {
				$('#main-nav').slideToggle('fast', function() {
					$('#main-nav').css({
						
						// The height must be fixed for the native scrolling on iOS
						'height': $(this).height(),
						
						// But we don't want the height of the nav to exceed the viewport.
						'max-height': $(window).height() + 20
					});
				});
				
				$(this).toggleClass('active');
						
			}); // end on.click
			
			// Making the children appear on click/touch
			$('#main-nav ul li.hasChildren a').on('click', function() {
				$(this).parent().children('ul').slideToggle('fast', function() {
				
				$('#main-nav').css({
					
					// Resetting the height to auto in order to expand/contract the menu upon interaction.
					'height': 'auto',
					
					// But we don't want the height of the nav to exceed the viewport.
					'max-height': $(window).height() + 20
				});
								
				}); // end slideToggle
				
			}); // end on.click
			
		} // end visibility check
	
});


 $(document).ready(function() {
    $("#menu-toggle a").click(function () {
      $("#menu-dropdown").toggleClass("expand");
      $("#search-dropdown, #contact-dropdown, #search-arrow, #contact-arrow").removeClass("expand");
    });
    $("#search-toggle a").click(function () {
      $("#search-dropdown, #search-arrow").toggleClass("expand");
      $("#menu-dropdown, #contact-dropdown, #contact-arrow").removeClass("expand");
    });
    $("#contact-toggle a").click(function () {
      $("#quick-contact, #contact-arrow").toggleClass("expand");
      $("#search-dropdown, #menu-dropdown, #search-arrow").removeClass("expand");
    });
  });



// Responsive layout, resizing the items
$('#client-list').carouFredSel({
	auto: false,
	responsive: true,
	width: '100%',
	scroll: 2,
	height: '100',
	prev: '#prev4',
	next: '#next4',
	infinite: false,
	circular: false, 
	items: {
		width: 200,
		visible: {
			min: 2,
			max: 6,
			height: '100'
		}
	},
	swipe: { onTouch: true, }
	
});


jQuery(document).ready(function($) {
	$('#work').isotope({
		// options
		itemSelector : '.item',
		layoutMode : 'masonry'
	});

});

jQuery(function($){
	$('.item').mosaic({
		animation	:	'fade'	});
});


$(document).ready(function(){
	var $container = $('#work');
	$container.isotope({
		filter: '*',
		animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false
		}
	});
$('#filter a').click(function(){
    var selector = $(this).attr('data-filter');
    $container.isotope({
        filter: selector,
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });
  return false;
});

// set selected menu items
var $optionSets = $('.option-set'),
	$optionLinks = $optionSets.find('a');
	$optionLinks.click(function(){
		var $this = $(this);
		if ($this.hasClass('selected')) {
			return false;
}
var $optionSet = $this.parents('.option-set');
	$optionSet.find('.selected').removeClass('selected');
	$this.addClass('selected');

});
});

   $(function(){

      var $container = $('#work');
    
      $container.imagesLoaded( function(){
        $container.isotope({
          itemSelector : '.photo'
        });
      });
    
    
    });


$(document).ready(function(){
	$('#tabs div.tab-content').hide();
	$('#tabs div.tab-content:first').show().addClass('active');
	$('#tabs ul li:first').addClass('active');
	$('#tabs ul li a').click(function(){ 
	$('#tabs ul li').removeClass('active');
	$(this).parent().addClass('active'); 
	var currentTab = $(this).attr('href'); 
	$('#tabs div').hide().removeClass('active');
	$(currentTab).show().addClass('active');
	return false;
	});
});






