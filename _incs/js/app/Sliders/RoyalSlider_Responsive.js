/* ===================================================================================
 * Name     : RoyalSlider_Responsive
 * Version  : 1.0
 * URL      : https://github.com/criograhy/
 *
 * Author   : Marek Lenik / Criography
 *            http://criography.com
 *
 * Licensed under the MIT license.
 * ===================================================================================
 * Adds custom responsiveness to Royal Slider
 *
 * @dependency
 * =================================================================================== */

/*jshint smarttabs: true */
/*global jQuery:true, Modernizr:true */



(function($, window, document, undefined){
	"use strict";

	var pluginName			= 'RoyalSlider_Responsive',
			originalHeight	= 0;




	/* -----------------------------------------------------------------------------
	 * RoyalSlider_Responsive
	 * -----------------------------------------------------------------------------
	 * @constructor
	 * @private
	 * @param {object} el jQuery object upon which the plugin was called
	 * @param {object} options parameters passed to the plugin
	 * -----------------------------------------------------------------------------*/

	function RoyalSlider_Responsive(element, options){
		this.element				= $(element);
		this.slider					= this.element.data('royalSlider');
		this.thumbContainer = $('.rsThumbsContainer', this.element);
		this.vh							= 0;
		this.vw							= 0;

		var _this						= this;


		this.init();
		$(window).resize(function(){
			_this.init();
		});

	}

	/* -----------------------------------------------------------------------------
	 * ENDOF: RoyalSlider_Responsive
	 * -----------------------------------------------------------------------------*/











	/**-----------------------------------------------------------------------------
	 * PROTOTYPE METHODS [DOM/SUBJECT RELATED]
	 * -----------------------------------------------------------------------------*/
	RoyalSlider_Responsive.prototype = {

		/**----------------------------------------------------------------------------- 
		 * calculateSize
		 * ----------------------------------------------------------------------------- 
		 * calculates slider height based on viewport width and orientation.
		 * Not something I'd do, but that's the cost of trying to adapt not truly 
		 * responsive solutions to  RWD.
		 * 
		 * @private
		 * @this jQuery object
		 * -----------------------------------------------------------------------------*/

			calculateSize : function(){

				var newHeight = 1;
	

	
				/* for devices of which width is smaller than 480px make the slider 80% if the viewport height */
				if(this.vw<=480){
	
					this.element.css({height: Math.round(this.vh *0.8)}).addClass('responsive');



				/* for devices of which width is between 481px and 1248px resize by width and orientation */
				}else if(this.vw>480 && this.vw<=1248){
	
					//portrait
					if(this.vh>this.vw){
						newHeight = Math.round(this.vh *0.6);
	
						if(newHeight>635){
							newHeight=635;
						}
						this.element.css({height: newHeight}).addClass('responsive');
	
	
	
					//landscape
					}else{
						newHeight = Math.round(this.vh *0.8);
	
						if(newHeight>635){
							newHeight=635;
						}
	
						this.element.css({height: newHeight}).addClass('responsive');

	
					}

				/* otherwise reset to default */
				}else{
					this.element.css({height: originalHeight}).removeClass('responsive');
				}
	
			},
		
		/**----------------------------------------------------------------------------- 
		 * ENDOF:                                                     
		 * -----------------------------------------------------------------------------*/





		/**-----------------------------------------------------------------------------
		 * correctThumbList
		 * -----------------------------------------------------------------------------
		 * corrects width and position of the responsively sized thumb container
		 *
		 * @private
		 * @this jQuery object
		 * -----------------------------------------------------------------------------*/

			correctThumbList : function(){

				if(this.thumbContainer.width() > this.vw){
					this.thumbContainer.removeClass('centered');
				}else{
					this.thumbContainer.addClass('centered');
				}
		
			},

		/**-----------------------------------------------------------------------------
		 * ENDOF: correctThumbList
		 * -----------------------------------------------------------------------------*/




			init : function(){

				this.vh	= window.innerHeight;
				this.vw	= $(window).width();

				if(originalHeight === 0){
					originalHeight = this.element.height();
				}


				this.calculateSize();
				this.correctThumbList();

				this.slider.updateSliderSize();

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
				$.data(this, "plugin_" + pluginName, new RoyalSlider_Responsive(this, options));
			}
		});

	};
	/**-----------------------------------------------------------------------------
	 * ENDOF: PLUGIN WRAPPER
	 * -----------------------------------------------------------------------------*/



})(jQuery, window, document);