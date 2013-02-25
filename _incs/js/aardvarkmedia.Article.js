
	$(document).ready(function(){



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