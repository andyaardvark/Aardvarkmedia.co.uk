/* ===================================================================================
 * Name     : Accordion
 * Version  : 1.0
 * URL      : https://github.com/criograhy/
 *
 * Author   : Marek Lenik / Aardvark Media
 *            http://aardvarkmedia.co.uk
 *
 * Licensed under the MIT license.
 * ===================================================================================
 * Expands CSSonly accordion menu with animations
 *
 * @dependency jQuery
 * =================================================================================== */

/*jshint smarttabs: true */
/*global jQuery:true, Modernizr:true */


(function($, window, document, undefined){
	"use strict"

	var pluginName  = 'Accordion',
			defaults    = {
											duration: 300,
											easing  : 'linear'
										},
			_this       = {};


	/* -----------------------------------------------------------------------------
	 * Accordion
	 * -----------------------------------------------------------------------------
	 * @constructor
	 * @private
	 * @param {object} element jQuery object upon which the plugin was called
	 * @param {object} options parameters passed to the plugin
	 * -----------------------------------------------------------------------------*/

	function Accordion(element, options){
		_this = this;

		_this.element = element;
		_this.options = $.extend({}, defaults, options);
		_this.contents	= $('.accordion-content', _this.element);              /* all expandable blocks */
		_this.inputs   = $('input[name=accordion-reasons]', _this.element);   /* all radio instances */



		//bind focus on labels to increase accessiblity
		_this.bindFocusToLabels();

		//init animations
		_this.init();

	}

	/* -----------------------------------------------------------------------------
	 * ENDOF: Accordion
	 * -----------------------------------------------------------------------------*/


	/* -----------------------------------------------------------------------------
	 * HELPERS
	 * -----------------------------------------------------------------------------*/

	/* -----------------------------------------------------------------------------
	 * ENDOF: HELPERS
	 * -----------------------------------------------------------------------------*/


	/**-----------------------------------------------------------------------------
	 * PROTOTYPE METHODS [DOM/SUBJECT RELATED]
	 * -----------------------------------------------------------------------------*/
	Accordion.prototype = {



/**-----------------------------------------------------------------------------
 * bindFocusToLabels
 * -----------------------------------------------------------------------------
 * makes sure that interactivity is supported for tabbing as well
 *
 * @private
 * @this jQuery Object, also referred to as _this
 * -----------------------------------------------------------------------------*/

	bindFocusToLabels: function(){
    $('label', this.element).on('focus', function(){

			if($(this).data('tabid')!==_this.inputs.filter(':checked').val()*1){
				_this.inputs.eq($(this).data('tabid')).prop('checked', true).trigger('change');
			}

    });
	},

/**-----------------------------------------------------------------------------
 * ENDOF: bindSpacesToLabels
 * -----------------------------------------------------------------------------*/






/**-----------------------------------------------------------------------------
 * init
 * -----------------------------------------------------------------------------
 * introduces animations to compensate for lack of support for height:auto CSS transition
 *
 * @private
 * @this jQuery Object, also referred to as _this
 * -----------------------------------------------------------------------------*/

	init: function(){


		//reset radio
		_this.inputs.eq(0).prop('checked', true);



		//force open the pre-checked or first section
		_this.contents.eq(0).addClass('visible').css('height', 'auto').parents('li:first').addClass('accordion-current');



		//uncheck the toggler input and add event listener
	$('input[name=accordion-reasons]', _this.element).on('change', function(e){

			var target        = _this.contents.eq($(this).prop('value') * 1),
					targetHeight  = target.height()*1;


			// CURRENT(S)
			//------------


			$('.accordion-current', _this.element).find('.accordion-content').each(function(){

				$(this).css('height', $(this).height()).stop().delay(1, function(){

					//animate it to 0
					$(this).stop().animate({'height':0}, _this.options.duration, _this.options.easing, function(){

						//remove from the viewport and get rid of static height, so next activation can read the correct value
						$(this).removeClass('visible').css({height: ''}).
							parents('li:first').removeClass('accordion-current');

					});
				});

			});


			console.log(5);
			// TARGET
			// -----------
			//move to the viewport, and set height to 0
			target.addClass('visible').delay(1, function(){
				console.log(6);
				//animate to exact height, and remove strict height on case the browser is resized
				$(this).stop().animate({height: targetHeight}, _this.options.duration, _this.options.easing, function(){
					$(this).css('height', 'auto');
				}).parents('li:first').addClass('accordion-current');

			});

		});

	}

/**-----------------------------------------------------------------------------
 * ENDOF: init
 * -----------------------------------------------------------------------------*/






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
			if( !$.data(this, "plugin_" + pluginName) ){
				$.data(this, "plugin_" + pluginName, new Accordion(this, options));
			}
		});

	};
	/**-----------------------------------------------------------------------------
	 * ENDOF: PLUGIN WRAPPER
	 * -----------------------------------------------------------------------------*/


})(jQuery, window, document);
