/* ===================================================================================
 * Name     : Main Home Controller
 * Version  :
 * URL      : https://github.com/criograhy/
 *
 * Author   : Marek Lenik / Criography
 *            http://criography.com
 *
 * Licensed under the MIT license.
 * ===================================================================================
 *
 *
 * @dependency
 * =================================================================================== */

/*jshint smarttabs: true */
/*global jQuery:true, Modernizr:true */

(function($, document){
	"use strict";






	$(document).ready(function() {

		var slider = $('#new-royalslider-1');



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



		/* Resize slider on the fly. This is expensive—do not overuse! */
		slider.RoyalSlider_Responsive();





		ContactForm7_Override._init($('#quick-contact'));


	});










	$(window).load(function(){


		/* Load latest tweet */
		Twitter._loadFeed({

			target		: $('#twitterBalloon'),
			username	: 'aardvarkmedia',
			tweetNum	: 1,
			attrs			: {rel:'nofollow'}

		});


	});


})(jQuery, document);


