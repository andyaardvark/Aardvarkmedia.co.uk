<?php
	/**
	 * functions and definitions
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 */


	/*  Required external files */

	require_once( 'external/utilities.php' );

	
	/*   Theme specific settings   */

	// Define menus
	register_nav_menus( array(
	'mainleft' => 'Main Left Navigation',
	'mainright' => 'Main Right Navigation'
	) );

     // Custom admin logo
     function my_custom_login_logo() {
	 echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/images/admin/aardvark-logo-admin.png) !important; }
      </style>';
      }
     add_action('login_head', 'my_custom_login_logo');
	
     // Remove contact form 7 css and js scripts	
	add_action( 'wp_print_styles', 'deregister_cf7_styles', 100 );
	function deregister_cf7_styles() {
	    if ( !is_page(100) ) {
	        wp_deregister_style( 'contact-form-7' );
	    }
	}

	add_action( 'wp_print_scripts', 'deregister_cf7_javascript', 100 );
	function deregister_cf7_javascript() {
	    if ( !is_page(100) ) {
	        wp_deregister_script( 'contact-form-7' );
	    }
	}

	// Remove unnessary classes (keep "current-menu-item")
	add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1);
	add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1);
	add_filter('page_css_class', 'my_css_attributes_filter', 100, 1);
	  function my_css_attributes_filter($var) {
		  return is_array($var) ? array_intersect($var, array('current-menu-item')) : '';
		  }

     add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
	function special_nav_class($classes, $item){
		$title = strtolower($item->title);
		$classes[] = $title;
		return $classes;
		}
	
	
	// Limit Exerpt Lengths)
	function excerpt($limit) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
			array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	  } else {
		  $excerpt = implode(" ",$excerpt);
			 }	
	  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	  return $excerpt;
	}
 
	function content($limit) {
	  $content = explode(' ', get_the_content(), $limit);
	  if (count($content)>=$limit) {
	    array_pop($content);
	    $content = implode(" ",$content).'...';
	  } else {
	    $content = implode(" ",$content);
	  }	
	  $content = preg_replace('/\[.+\]/','', $content);
	  $content = apply_filters('the_content', $content); 
	  $content = str_replace(']]>', ']]&gt;', $content);
	  return $content;
	}
	
	add_filter('new_royalslider_skins', 'new_royalslider_add_custom_skin', 10, 2);
	function new_royalslider_add_custom_skin($skins) {
      $skins['aardvark'] = array(
           'label' => 'Aardvark',
           'path' => '/wp-content/plugins/new-royalslider/lib/royalslider/skins/aardvark/rs-aardvark.css'
      );
      return $skins;
}
	
	/*  Actions and Filters */

	add_action( 'wp_enqueue_scripts', 'script_enqueuer' );

	add_filter( 'body_class', 'add_slug_to_body_class' );
	
	
	/* Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );  */

	/* ---------  */
	
	

	/* Scripts  */

	/** Add scripts via wp_head() */


	function script_enqueuer() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js', false);
		wp_register_script( 'flexslider', get_template_directory_uri().'/js/jquery.plugins-min.js', array( 'jquery' ), '1.0', true  );
		wp_register_script( 'royalslider', get_template_directory_uri().'/js/jquery.royalslider.min.js', array( 'jquery' ), '1.0', true  );
		wp_register_script( 'settings', get_template_directory_uri().'/js/settings.js', array( 'jquery' ), '1.0', true  );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'flexslider' );
		wp_enqueue_script( 'royalslider' );
		wp_enqueue_script( 'settings' );

		wp_register_style( 'screen', get_template_directory_uri().'/style.css', '', '', 'screen' );
		
        wp_enqueue_style( 'screen' );
	}	
	
		add_action('wp_enqueue_scripts', 'my_scripts_method');
		

	/* Comments  */

	/*  Custom callback for outputting comments  */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}
	


