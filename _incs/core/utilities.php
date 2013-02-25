<?php



/**
 * cgy_get_static_domain
 * --------------------------------------------------
 * returns the url of static domain
 *
 * @return string
 */

function cgy_get_static_domain(){
	return str_replace('http://', 'http://static.', get_bloginfo('wpurl', 'raw'));
}







/**
 * cgy_get_current_page
 * --------------------------------------------------
 * Detects section type to be used to retrieve corresponding js and css.
 *
 * @return string
 */

function cgy_get_current_page(){
	$page = 'article';
	if      (is_404())                                    { $page= '404';        }
	else if (is_tag() || is_search() || is_archive())     { $page= 'archive';    }
	else if (is_home() || is_front_page())                { $page= 'home';       }
	else if (is_page_template('page-styleGuide.php'))     { $page= 'styleguide'; }
	else if (is_single() && get_post_type()==='our-work') { $page= 'work';       }
	return $page;
}











/**
 * cgy_or
 * --------------------------------------------------
 * equivalent of JS's a||b||c returns first nonempty value
 *
 * @param array $arg all arguments
 * @return string or number
 */

function cgy_or($args){
	return is_array($args) ? current(array_filter($args)) : false;

}








/**
 * cgy_parse_yt
 * --------------------------------------------------
 * parses YT link and returns video ID
 *
 * @param string $url YouTube URL
 * @return string Video ID
 */

function cgy_parse_yt($url){
	$url = parse_url($url);
	parse_str($url['query'], $query);
	return cgy_or(array($query['v'], $query['amp;v']));
}











/**
 * is_colour
 * check if the string is a hex colour
 *
 * @param string $str string to be tested
 * @return
 */

function is_colour($str){
	 return preg_match('/^#[a-f0-9]{6}$/i', $str) ? $str : false;
}



/**
 * adjustBrightness
 * --------------------------------------------------
 * http://stackoverflow.com/a/11951022
 * by Torkil Johnsen
 * --------------------------------------------------
 * @param string $hex string containing hex colour
 * @param float $steps amount of colour change
 * @return string New colour hex value;
 */

function adjustBrightness($hex, $steps){
	// Steps should be between -255 and 255. Negative = darker, positive = lighter
	$steps = max(-255, min(255, $steps));

	// Format the hex color string
	$hex = str_replace('#', '', $hex);
	if (strlen($hex) == 3) {
		$hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
	}

	// Get decimal values
	$r = hexdec(substr($hex,0,2));
	$g = hexdec(substr($hex,2,2));
	$b = hexdec(substr($hex,4,2));

	// Adjust number of steps and keep it inside 0 to 255
	$r = max(0,min(255,$r + $steps));
	$g = max(0,min(255,$g + $steps));
	$b = max(0,min(255,$b + $steps));

	$r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
	$g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
	$b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

	return '#'.$r_hex.$g_hex.$b_hex;
}








	/**
	 * Starkers Utility Functions v.1.0
	 *
	 * @package 	WordPress
	 * @subpackage 	Starkers
	 * @since 		Starkers 4.0
	 *
	 * We've included a number of helper functions that we use in every theme we produce.
	 * The main one that is used in Starkers is 'add_slug_to_body_class', this will add the page or post slug to the body class
	 */

	/**
	 * Print a pre formatted array to the browser - very useful for debugging
	 *
	 * @param 	array
	 * @return 	void
	 **/
	function print_a( $a ) {
		print( '<pre>' );
		print_r( $a );
		print( '</pre>' );
	}

	/**
	 * Simple wrapper for native get_template_part()
	 * Allows you to pass in an array of parts and output them in your theme
	 * e.g. <?php get_template_parts(array('part-1', 'part-2')); ?>
	 *
	 * @param 	array 
	 * @return 	void
	 **/
	function get_template_parts( $parts = array() ) {
		foreach( $parts as $part ) {
			get_template_part( $part );
		};
	}

	/**
	 * Pass in a path and get back the page ID
	 * e.g. get_page_id_from_path('about/terms-and-conditions');
	 *
	 * @param 	string 
	 * @return 	integer
	 **/
	function get_page_id_from_path( $path ) {
		$page = get_page_by_path( $path );
		if( $page ) {
			return $page->ID;
		} else {
			return null;
		};
	}

	/**
	 * Append page slugs to the body class
	 * NB: Requires init via add_filter('body_class', 'add_slug_to_body_class');
	 *
	 * @param 	array 
	 * @return 	array
	 */
	function add_slug_to_body_class( $classes ) {
		global $post;
	   
		if( is_home() ) {			
			$key = array_search( 'blog', $classes );
			if($key > -1) {
				unset( $classes[$key] );
			};
		} elseif( is_page() ) {
			$classes[] = sanitize_html_class( $post->post_name );
		} elseif(is_singular()) {
			$classes[] = sanitize_html_class( $post->post_name );
		};

		return $classes;
	}
	
	/**
	 * Get the category id from a category name
	 *
	 * @param 	string 
	 * @return 	string
	 */
	function get_category_id( $cat_name ){
		$term = get_term_by( 'name', $cat_name, 'category' );
		return $term->term_id;
	}

	