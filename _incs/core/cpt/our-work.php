<?php
/**
 * Module Name: Our Work CPT
 *
 * @package <theme name>
 * @since 1.0
 */




	/**
	 * add_projects_category
	 * --------------------------------------
	 * Adds taxonomy to Project view
	 */

	function add_projects_types(){

		register_taxonomy('project-type', array('our-work'), array(
			'hierarchical'        => true,
			'show_ui'             => true,
			'show_admin_column'   => true,
			'query_var'           => true,
			'labels' => array(
				'name'              => _x('Project Types', 'taxonomy general name'),
				'singular_name'     => _x('Project Type', 'taxonomy singular name'),
				'search_items'      => __('Search Project Types'),
				'all_items'         => __('All Project Types'),
				'parent_item'       => __('Parent Project Type'),
				'parent_item_colon' => __('Parent Project Type:'),
				'edit_item'         => __('Edit Project Type'),
				'update_item'       => __('Update Project Type'),
				'add_new_item'      => __('Add New Project Type'),
				'new_item_name'     => __('New Project Type Name'),
				'menu_name'         => __('Project Types'),
			),
			'rewrite' => array(
				'slug'         => 'our-work/category', // This controls the base slug that will display before each term
				'with_front'   => false, // Don't display the category base before "/types/"
				'hierarchical' => true // This will allow URL's like "/types/corporate/"
			),
		));


	}
	add_action( 'init', 'add_projects_types', 0 );


/**
 * projects_register
 * --------------------------------------
 * Adds home promos CPT
 */

function am_projects_register(){

	$args = array(
		'label'           => __('Our Work'),
		'singular_label'  => __('Project'),
		'public'          => true,
		'show_ui'         => true,
		'capability_type' => 'post',
		'has_archive'     => true,
		'hierarchical'    => false,
		'rewrite'         => array('slug' => 'our-work', 'with_front' => true),
		'menu_position'   => 5,
		'supports'        => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
		'taxonomies'      => array('post_tag')
	);

	register_post_type( 'our-work' , $args );
}
add_action('init', 'am_projects_register');








/**
 * add_dynamic_taxonomy_rewrites
 * ------------------------------------------------------
 * makes sure that custom taxonomies don't need static prefix ('category')
 */

	function add_dynamic_taxonomy_rewrites() {

		$terms = get_terms("project-type");

		if( count($terms)>0 ){
			foreach ( $terms as $term ) {
				add_rewrite_rule("^our-work/$term->name/?",'index.php?post_type=our-work&project-type=$term->name','top');
			}
		}

	}
	add_action('init','add_dynamic_taxonomy_rewrites');







// ------------------------------------------
// CSS
// ------------------------------------------

//override admin icons
function am_projects_icons() {?>
<style type="text/css" media="screen">
	#menu-posts-our-work .wp-menu-image {
		background: url(<?php bloginfo('template_directory'); ?>/_incs/images/admin/icon-our-work.png) no-repeat 6px -16px !important;
	}

	#menu-posts-our-work:hover .wp-menu-image,
	#menu-posts-our-work.wp-menu-open .wp-menu-image {
		background-position:6px 8px !important;
	}
</style>
<?php }

add_action('admin_head', 'am_projects_icons');





/**
 * am_projects_archive_num
 * ----------------------------------
 * Change the amount of post displayed in this custom post type archive view
 *
 * @param object $q Wordpress Query
 */

function am_projects_archive_num($q){

	$options  = get_option('am_options');
	$value    = (isset( $options['am_visible_posts_in_grid']) && $options['am_visible_posts_in_grid'] >0) ? $options['am_visible_posts_in_grid'] : 8;

  if ($q->is_main_query() && $q->is_post_type_archive('our-work') && !is_admin())
    $q->set('posts_per_page', $value);
}

add_action('pre_get_posts', 'am_projects_archive_num');












?>