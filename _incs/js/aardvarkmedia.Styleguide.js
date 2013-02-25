
	$(document).ready(function(){
		var inlineGalleries = $('.gallery-inline');


		$('article[role="main"]').fitVids();




		// Initialize Galleria
		if(inlineGalleries.length>0){

			// Load the classic theme
			Galleria.loadTheme('/_incs/js/lib/galleria/theme/galleria.classic.min.js');

			inlineGalleries.galleria({
																height        : $(window).height()*.5,
																showInfo      : false,
																transition    :'fade',
																extend        : function(options) {
																	/*
																	Galleria.ready( function(){
																		var gal=Galleria.get(0);
																		$('<a class="fs"></a>').appendTo('#galleria div.galleria-container').click(function(){
																			gal.toggleFullscreen(); // works!

																		});
																	})
																	*/
																}
															}).css('height', 'auto');
		}





		$A.publish('forms/init',	{
			el			:	$('form'),
			options	:{
				inputs		: ['range', 'combobox', 'date'],
				validate	: true
			}
		});


	});

