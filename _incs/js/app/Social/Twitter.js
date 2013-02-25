/* ===================================================================================
 * Name     : Twitter
 * Version  : 1.0
 * URL      : https://github.com/criograhy/
 *
 * Author   : Marek Lenik / Criography
 *            http://criography.com
 *
 * Licensed under the MIT license.
 * ===================================================================================
 * Main Twitter module. Expand if required.
 *
 * @dependency
 * =================================================================================== */

/*jshint smarttabs: true */
/*global jQuery:true, Modernizr:true */

var Twitter = (function(){
	"use strict";

	var version		= 1.0,
			username	= '',
			target		= {},

			_url			= '',
			_feed			= [],







	/**----------------------------------------------------------------------------- 
	 * parseURL
	 * ----------------------------------------------------------------------------- 
	 * wraps <a/> elements around URLs
	 *
	 * @private
	 * @param {string} str Text string containign urls
	 * @param {object} attr any HTML attributes to be appended to </a> element
	 * @return given string with urls foramtted as <a> elements
	 * -----------------------------------------------------------------------------*/
	
		parseURL	= function(str, attr){
			return str.replace(/((ftp|https?):\/\/([-\w\.]+)+(:\d+)?(\/([\w\/_\.]*(\?\S+)?)?)?)/gm, function(url){
				var attributes='';
	
				if(attr instanceof Object){
					for(var a in attr){
						if(attr.hasOwnProperty(a)){
							attributes += a+'="'+attr[a]+'" ';
						}
					}
				}
	
				return '<a href="'+url+'" '+attributes+'>'+url+'</a>';
			});
		},
	 
	/**----------------------------------------------------------------------------- 
	 * ENDOF: parseURL                                                    
	 * -----------------------------------------------------------------------------*/ 
	
	
	
	
	
	
	
	
	/**----------------------------------------------------------------------------- 
	 * parseTwitterUsername
	 * ----------------------------------------------------------------------------- 
	 * parses Twitter usernames as <a/> links
	 *
	 * @private 
	 * @param {string} str Text string containign Twitter usernames
	 * @param {object} attr any HTML attributes to be appended to </a> element
	 * @return given string with Twitter usernames formatted as <a> elements
	 * -----------------------------------------------------------------------------*/
	
		parseTwitterUsername  = function(str, attr){
			return str.replace(/[@]+[A-Za-z0-9-_]+/g, function(usr) {
				var attributes='';
	
				if(attr instanceof Object){
					for(var a in attr){
						if(attr.hasOwnProperty(a)){
							attributes+=a+'="'+attr[a]+'" ';
						}
					}
				}
	
				return '<a href="http://twitter.com/'+usr.substr(1)+'" '+attributes+'>'+usr+'</a>';
			});
		},
	 
	/**----------------------------------------------------------------------------- 
	 * ENDOF: parseTwitterUsername                                                    
	 * -----------------------------------------------------------------------------*/ 
	
	


	
	
	
	
	/**----------------------------------------------------------------------------- 
	 * parseTwitterHash
	 * ----------------------------------------------------------------------------- 
	 *  parses Twitter hashtags as <a/> links
	 *
	 * @private
	 * @param {string} str Text string containign Twitter hashtags
	 * @param {object} attr any HTML attributes to be appended to </a> element
	 * @return given string with Twitter hashtags formatted as <a> elements
	 * -----------------------------------------------------------------------------*/
	
		parseTwitterHash	= function(str, attr){
			return str.replace(/[#]+[A-Za-z0-9-_]+/g, function(hash) {
				var attributes='';
	
				if(attr instanceof Object){
					for(var a in attr){
						if(attr.hasOwnProperty(a)){
							attributes+=a+'="'+attr[a]+'" ';
						}
					}
				}
	
				return '<a href="http://search.twitter.com/search?q=%23'+hash.substr(1)+'" '+attributes+'>'+hash+'</a>';
			});
		},
	 
	/**----------------------------------------------------------------------------- 
	 * ENDOF: parseTwitterHash                                                    
	 * -----------------------------------------------------------------------------*/ 











	/**-----------------------------------------------------------------------------
	 * parseTwitter
	 * -----------------------------------------------------------------------------
	 * parse a string and format all link-like bits as <a/> elemenst
	 *
	 * @private
	 * @param {string} str Text string containing link-like bits
	 * @param {object} attr any HTML attributes to be appended to </a> elements
	 * @return given string with link-like bits formatted as <a> elements
	 * -----------------------------------------------------------------------------*/

		parseTwitter	=	function(str, attr){
			return parseTwitterHash(parseTwitterUsername(parseURL(str, attr), attr), attr);
		},

	/**-----------------------------------------------------------------------------
	 * ENDOF: parseTwitter
	 * -----------------------------------------------------------------------------*/












	/**----------------------------------------------------------------------------- 
	 * loadFeed	
	 * ----------------------------------------------------------------------------- 
	 * loads Twitter feed and sets it as a _feed variable and appends it to the give target element
	 *
	 * @private
	 * @param {object} options {target, username, tweetNum, attrs}
	 * @return
	 * -----------------------------------------------------------------------------*/ 
	
		loadFeed = function(options){
	    if(options.username.length>0 && (typeof options.tweetNum==='number' && options.tweetNum%1===0)){
				_url = 'https://api.twitter.com/1/statuses/user_timeline.json?include_entities=0&include_rts=1&screen_name='+options.username+'&count='+options.tweetNum+'&trim_user=1&callback=?';

				$.getJSON(_url, function(data){
					options.target.html(parseTwitter(data[0].text, options.attrs));
				});

			}
		};
	 
	/**----------------------------------------------------------------------------- 
	 * ENDOF: loadFeed
	 * -----------------------------------------------------------------------------*/ 







	return {
		_loadFeed	: loadFeed
	};

})();