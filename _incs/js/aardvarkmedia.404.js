requirejs.config({

	baseUrl: '/js/lib',

	paths: {
		app   : '../app',
		jquery: '//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min'
	}

});

// Start the main app logic.

requirejs(['jquery', 'app/App'],
	function($, App){

	}
);