/* ===================================================================================
 * Name     : Nav
 * Version  : 1.0
 * URL      : https://github.com/criography/
 *
 * Author   : Marek Lenik
 *            http://aardvarkmedia.co.uk
 *
 * Licensed under the MIT license.
 * ===================================================================================
 * enhances responsive navigation dropdowns with animations;
 * remove once transitions to height:auto are introduced to all browsers.
 *
 * @dependency jQuery
 * =================================================================================== */

/*jshint smarttabs: true */
/*global jQuery:true, Modernizr:true */



(function($, window, document, undefined){
	"use strict";

	var pluginName = 'Nav',
		defaults = {
			contactToggler          : false,
			contactContainer        : false,
			subnav                  : false,
			subnavToggler           : false,
			serviceTogglerMinWidth  : 0
		};





	/* -----------------------------------------------------------------------------
	 * Nav
	 * -----------------------------------------------------------------------------
	 * @constructor
	 * @private
	 * @param {object} el jQuery object upon which the plugin was called
	 * @param {object} options parameters passed to the plugin
	 * -----------------------------------------------------------------------------*/

	function Nav(element, options){
		this.element = element;
		this.options = $.extend({}, defaults, options);


		this.init();
	}

	/* -----------------------------------------------------------------------------
	 * ENDOF: Nav
	 * -----------------------------------------------------------------------------*/








	/* -----------------------------------------------------------------------------
	 * HELPERS
	 * -----------------------------------------------------------------------------*/

	var correctedViewportW = function(){

		var mM      = window['matchMedia'] || window['msMatchMedia'],
				client  = document.documentElement['clientWidth'],
				inner   = window['innerWidth'];

		return (mM && client<inner && true===mM('(min-width:' + inner + 'px)')['matches'] ? window['innerWidth'] : document.documentElement['clientWidth']);

	};

	/* -----------------------------------------------------------------------------
	 * ENDOF: HELPERS
	 * -----------------------------------------------------------------------------*/








	/**-----------------------------------------------------------------------------
	 * PROTOTYPE METHODS [DOM/SUBJECT RELATED]
	 * -----------------------------------------------------------------------------*/
	Nav.prototype = {

		/*-----------------------------------------------------------------------------
		 * INIT QUICK CONTACT
		 * -----------------------------------------------------------------------------
		 * Slides quick contact panel up and down.
		 * Note: certain values are not cached intentionally,
		 *       to allow for dimension change on browser resize.
		 * -----------------------------------------------------------------------------*/
			initQuickContact : function(){
				var qcCont		= this.options.contactContainer;

				//neutralise CSS-only interactivity and offset container to hide quickContact
				qcCont.addClass('animated');

				//uncheck the toggler input and add event listener
				this.options.contactToggler.prop('checked', false).on('change', function(e){

					//on activation
					if($(this).is(':checked')){
						var qcHeight = qcCont.height();

						//move to the viewport, and set height to 0
						qcCont.addClass('visible').css({height: 0}).delay(1, function(){

							//animate to exact height, and remove strict height on case the browser is resized
							$(this).stop().animate({height: qcHeight}, 300, 'linear', function(){
								$(this).css('height', 'auto');
							});
						});



					}else{

						//set current height value
						qcCont.css('height', qcCont.height()).delay(1, function(){

							//animate it to 0
							$(this).stop().animate({'height':0}, 300, 'linear', function(){

								//remove from the viewport and get rid of static height, so next activation can read the correct value
								qcCont.removeClass('visible').css({height: ''});
							});
						});
					}
				});

			},





		/*-----------------------------------------------------------------------------
		 * INIT SUBNAV
		 * -----------------------------------------------------------------------------
		 * Slides subnav panel up and down on lower resolutions
		 * -----------------------------------------------------------------------------*/
			initSubnav : function(){

				var snCont		= this.options.subnav;

				//neutralise CSS-only interactivity and offset container to hide subnav
				snCont.addClass('animated');

				//uncheck the toggler input and add event listener
				this.options.subnavToggler.prop('checked', false).on('change', function(e){

					//on activation
					if($(this).is(':checked')){
						var snHeight = snCont.height();

						//move to the viewport, and set height to 0
						snCont.addClass('visible').css({height: 0}).delay(1, function(){

							//animate to exact height, and remove strict height on case the browser is resized
							$(this).stop().animate({height: snHeight}, 300, 'linear', function(){
								$(this).css('height', 'auto');
							});
						});


					//on deactivation
					}else{

						//set current height value
						snCont.css('height', snCont.height()).delay(1, function(){

							//animate it to 0
							$(this).stop().animate({'height':0}, 300, 'linear', function(){

								//remove from the viewport and get rid of static height, so next activation can read the correct value
								snCont.removeClass('visible').css({height: ''});
							});
						});

					}

				});

			},





		/**-----------------------------------------------------------------------------
		 * initServiceFadeout
		 * -----------------------------------------------------------------------------
		 * Controls body fade animations upon services subnav show/hide
		 *
		 * @private
		 * @this jQuery object
		 * -----------------------------------------------------------------------------*/

			initServiceFadeout : function(){

				var base = this;

				if(this.options.serviceTogglerMinWidth){



					this.options.serviceToggler.hoverIntent({
						timeout : 300,

						over    : function(){

												if(correctedViewportW() >= base.options.serviceTogglerMinWidth){

													base.options.serviceFadeables.addClass('fadeMeBabeOneMoreTime');
												}

											},

						out     : function(){
											if(correctedViewportW() >= base.options.serviceTogglerMinWidth){
													base.options.serviceFadeables.removeClass('fadeMeBabeOneMoreTime');
												}
											}
					});


				}

			},

		/**-----------------------------------------------------------------------------
		 * ENDOF: initServiceFadeout
		 * -----------------------------------------------------------------------------*/










		/*-----------------------------------------------------------------------------
		 * GLOBAL INIT
		 * -----------------------------------------------------------------------------*/
			init : function(){

				// init Quick Contact animations
				if(this.options.contactToggler && this.options.contactContainer){
					this.initQuickContact();
				}


				//init Responsive animations
				if(this.options.subnavToggler && this.options.subnav){
					this.initSubnav();
				}


				//init service menu animations
				if(this.options.serviceToggler && this.options.serviceFadeables.length>0){

					this.serviceContainer = $('#servicesNav', this.options.serviceToggler);

					if(this.serviceContainer){
						this.initServiceFadeout();
					}

				}

			}

	};
	/**-----------------------------------------------------------------------------
	 * ENDOF: PROTOTYPE METHODS
	 * -----------------------------------------------------------------------------*/








	/*-----------------------------------------------------------------------------
	 * PLUGIN WRAPPER
	 * -----------------------------------------------------------------------------
	 * A really lightweight plugin wrapper around the constructor,
	 * preventing against multiple instantiations
	 * -----------------------------------------------------------------------------*/
	$.fn[pluginName] = function(options){

		return this.each(function(){
			if(!$.data(this, "plugin_" + pluginName)){
				$.data(this, "plugin_" + pluginName, new Nav(this, options));
			}
		});

	};
	/**-----------------------------------------------------------------------------
	 * ENDOF: PLUGIN WRAPPER
	 * -----------------------------------------------------------------------------*/



})(jQuery, window, document);