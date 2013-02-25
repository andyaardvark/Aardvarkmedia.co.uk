<?php
/**
 * Module Name: Services CPT
 *
 * @package <theme name>
 * @since 1.0
 */





/**
 * homeslide_register
 * --------------------------------------
 * Adds home promos CPT
 */

function am_services_register(){
	$args = array(
		'label' => __('Services'),
		'singular_label' => __('Service'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'rewrite' => true,
		'menu_position' => 5,
		'supports' => array('title', 'editor', 'excerpt', 'page-attributes', 'thumbnail', 'revisions')
	);

	register_post_type( 'services' , $args );
}
add_action('init', 'am_services_register');





// ------------------------------------------
// CSS
// ------------------------------------------

//override admin icons
function am_services_icons() {?>
<style type="text/css" media="screen">
	#menu-posts-services .wp-menu-image {
		background: url(<?php bloginfo('template_directory'); ?>/_incs/images/admin/icon-services.png) no-repeat 6px -16px !important;
	}

	#menu-posts-services:hover .wp-menu-image,
	#menu-posts-services.wp-menu-open .wp-menu-image {
		background-position:6px 8px !important;
	}
</style>
<?php }

add_action('admin_head', 'am_services_icons');


?>