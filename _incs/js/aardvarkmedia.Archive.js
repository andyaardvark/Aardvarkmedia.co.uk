/* ===================================================================================
 * Name     : Archive Pages Controller
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
 * @dependency jQuery
 * =================================================================================== */

/*jshint smarttabs: true */
/*global jQuery:true, Modernizr:true */

(function($, document){
	"use strict";






	$(document).ready(function() {

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


		//load more posts
		var gridList        = $('#workList'),
				pagination      = $('#pagination-ourWork'),
				paginateData    = pagination.data(),
				loadMoreButton  = $('<button class="button-single button-ajax" />').
														addClass($('a:first-child', pagination).attr('class')).
														html(paginateData.ajaxButton),
				scrollToNext    = 0;

		if(!Modernizr.cssanimations){
			gridList.find('li').removeClass('autoFadeIn');
		}


		if(paginateData.current===0){
			$('#pagination-ourWork').html(loadMoreButton);

			loadMoreButton.on('click', function(e){
				e.preventDefault();

				scrollToNext = $(this).offset().top - $('li:last-child', gridList).height()*.5;

				$(this).addClass('button-loading');

				if(paginateData.current < paginateData.totalPages){
					$.ajax({
						url    : "http://aardvarkmedia.co.uk/our-work/page/"+(paginateData.current===0 ? 2 : paginateData.current+1),
						type   : 'POST',
						data   : 'say_what=pokemons_are_among_us',
						success: function(html){

							if(!Modernizr.cssanimations){
								html = String(html).split('autoFadeIn').join('');
							}
							gridList.append(html);

							loadMoreButton.removeClass('button-loading');

							paginateData.current = (paginateData.current===0 ? 2 : paginateData.current+1);

							$('html, body').animate({ scrollTop: scrollToNext-100 }, 300);

							if(paginateData.current >= paginateData.totalPages){
								loadMoreButton.addClass('hidden');
							}
						}
					});
				}

			});
		}




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


