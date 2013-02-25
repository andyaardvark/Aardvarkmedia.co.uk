<?php
/**
 * Module Name: Vacancies CPT
 *
 * @package <theme name>
 * @since 1.0
 */





/**
 * homeslide_register
 * --------------------------------------
 * Adds home promos CPT
 */

function am_vacancies_register(){
	$args = array(
		'label' => __('Vacancies'),
		'singular_label' => __('Vacancy'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'page',
		'has_archive' => true,
		'hierarchical' => false,
		'rewrite' => true,
		'menu_position' => 6,
		'supports' => array('title', 'editor', 'revisions'),
		'taxonomies' => array('post_tag')
	);

	register_post_type( 'vacancies' , $args );
}
add_action('init', 'am_vacancies_register');





// ------------------------------------------
// CSS
// ------------------------------------------

//override admin icons
function am_vacancies_icons() {?>
<style type="text/css" media="screen">

  #menu-posts-vacancies .wp-menu-image {
    background    : url(<?php bloginfo('template_directory'); ?>/_incs/images/admin/icon-vacancies.png) no-repeat 6px -16px !important;
  }

  #menu-posts-vacancies:hover .wp-menu-image,
  #menu-posts-vacancies.wp-menu-open .wp-menu-image {
    background-position:6px 8px !important;
  }
</style>
<?php }

add_action('admin_head', 'am_vacancies_icons');












?>