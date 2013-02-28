<?php


/* INCLUDES
 * ----------------------------- */

/* Core */
require_once('_incs/core/rewrites.php');
require_once('_incs/core/admin_menus.php');


/* Custom Post Types */
require_once('_incs/core/cpt/our-work.php');
require_once('_incs/core/cpt/vacancies.php');


/* Utilities */
require_once( '_incs/core/utilities.php' );


/* Custom Menu Walkers */
require_once('_incs/core/menuWalkers.php');


/* All HTML Parsers and Generators */
require_once('_incs/html/nav.php');
require_once('_incs/html/toc.php');




/* SETTINGS
 * ----------------------------- */


/* disable admin bar */
add_filter('show_admin_bar', '__return_false');


/* add featured image support */
add_theme_support( 'post-thumbnails' );


/* allow svg */
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );














// Custom admin logo
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/admin/aardvark-logo-admin.png) !important; }
      </style>';
}
add_action('login_head', 'my_custom_login_logo');