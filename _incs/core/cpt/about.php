<?php
/**
 * Module Name: About Us CPT
 *
 * @package <theme name>
 * @since 1.0
 */





/**
 * homeslide_register
 * --------------------------------------
 * Adds home promos CPT
 */

function am_about_register(){
	$args = array(
		'label' => __('About Us'),
		'singular_label' => __('About Us Article'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
    'rewrite' => true,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'page-attributes', 'revisions')
	);

	register_post_type( 'about' , $args );
}
add_action('init', 'am_about_register');





// ------------------------------------------
// CSS
// ------------------------------------------

//override admin icons
function am_about_icons() {?>
<style type="text/css" media="screen">
	#menu-posts-about .wp-menu-image {
		background: url(<?php bloginfo('template_directory'); ?>/_incs/images/admin/icon-about.png) no-repeat 6px -16px !important;
	}

	#menu-posts-about:hover .wp-menu-image,
	#menu-posts-about.wp-menu-open .wp-menu-image {
		background-position:6px 8px !important;
	}
</style>
<?php }

add_action('admin_head', 'am_about_icons');


?>