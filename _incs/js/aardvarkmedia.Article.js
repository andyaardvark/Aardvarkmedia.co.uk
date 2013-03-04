/* ===================================================================================
 * Name     : Main Single Item Controller
 * Version  :
 * URL      : https://github.com/criograhy/
 *
 * Author   : Marek Lenik
 *            http://aardvarkmedia.co.uk
 *
 * Licensed under the MIT license.
 * ===================================================================================
 *
 *
 * @dependency jQuery
 * @dependency Modernizr
 * =================================================================================== */

/*jshint smarttabs: true */
/*global jQuery:true, Modernizr:true */

$(document).ready(function() {
	"use strict";

	/* progressively enhance responsive navigation with animations */
	$('#header').Nav({
		contactToggler          : $('#isQuickContactOpen'),
		subnavToggler           : $('#topNavInput'),
		contactContainer        : $('#quick-contact'),
		subnav                  : $('.topNav-links:first'),
		serviceToggler          : $('#services-toggler'),
		serviceFadeables        : $('.fadeable'),
		serviceTogglerMinWidth  : 960
	});


	ContactForm7_Override._init($('#quick-contact'));




	/* HEX GRID: manipulate DOM to be ready for hovering on non-touch devices */
	if(!Modernizr.touch && window.location.pathname.indexOf('/who-we-are')>0){

		$('.gridHex-entry-inner2', $('#about-team-grid')).on('mouseenter mouseleave', function(e){

			var overlay = $(e.target).parents('.gridHex-thumb').next();

			if(e.type==='mouseenter'){
				overlay.addClass('visible');
			}else{
				overlay.removeClass('visible');
			}
		});

	}




	/* extend accordion menu */
	if(window.location.pathname.indexOf('/10-reasons')>0){
		$('#about-reasons').Accordion({duration:300, easing: 'easeOutQuad'});
	}



});

$(window).load(function(){
	"use strict";


	/* Load latest tweet */
	Twitter._loadFeed({
		target		: $('#twitterBalloon'),
		username	: 'aardvarkmedia',
		tweetNum	: 1,
		attrs			: {rel:'nofollow'}
	});


});