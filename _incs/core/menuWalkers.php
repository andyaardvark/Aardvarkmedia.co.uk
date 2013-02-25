<?php
	/**
	 * @package WordPress
	 * @subpackage themename
	 */



/**
 * register_menus
 * ----------------------------------------------------
 * Adds menu support
 */

function register_menus(){
	register_nav_menus(array());
}
add_action( 'init', 'register_menus' );









	class CGY_Walker_Nav_Menu extends Walker_Nav_Menu {
		/**
		 * @see Walker::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param int $current_page Menu item ID.
		 * @param object $args
		 */
		function start_el(&$output, $item, $depth, $args) {
			global $wp_query;
			$class = (!empty( $item->classes ) && in_array('external', $item->classes)) ? 'external ' : '';

			$servicesClass='';

			if($depth===0 && in_array('services-toggler', $item->classes)){
				$servicesClass = ' id="'.reset($item->classes).'"';
			}else if($depth===1){
			 $servicesClass = ' class="serviceIcon '.reset($item->classes).'"' ;
			}



			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

			$output .='<li'.$servicesClass.'>';

			$item_output .= '<a '. $attributes .($class ? ' class="' .$class. '"' : '').' >';
			//$item_output .= $item->description ? '<span class="snippet">'.$item->description.'</span> ' : '';
			//$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			//$item_output .= $item->description ? '<span>'.apply_filters( 'the_title', str_replace(' ', ' </span><span>', $item->title), $item->ID ).'</span>' : apply_filters( 'the_title', $item->title, $item->ID );
			$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
			//$item_output .= , apply_filters( 'the_title', $item->title, $item->ID ), 1);
			$item_output .= '</a>';

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}



    /**
     * @see Walker::start_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "\n$indent<div id=\"servicesNav\"><em class=\"sideStripes-dark\"><span>".get_post_snippet('services-subnav-heading')."</span></em>\n";
      $output .= "\n$indent<ul class=\"inlineBlockList servicesNav-list\">\n";
    }





    /**
     * @see Walker::end_lvl()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
      $indent = str_repeat("\t", $depth);
      $output .= "$indent</ul>\n</div>\n";
    }


	}













	class AM_Walker_Footer_Menu extends Walker_Nav_Menu {
		/**
		 * @see Walker::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param int $current_page Menu item ID.
		 * @param object $args
		 */
		function start_el(&$output, $item, $depth, $args) {
			global $wp_query;
			$class = (!empty( $item->classes ) && in_array('external', $item->classes)) ? 'external ' : '';


			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

			$output .='<li>';

			$item_output .= '<a '. $attributes .($class ? ' class="' .$class. '"' : '').' >';
			//$item_output .= $item->description ? '<span class="snippet">'.$item->description.'</span> ' : '';
			//$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			//$item_output .= $item->description ? '<span>'.apply_filters( 'the_title', str_replace(' ', ' </span><span>', $item->title), $item->ID ).'</span>' : apply_filters( 'the_title', $item->title, $item->ID );
			$item_output .= apply_filters( 'the_title', $item->title, $item->ID );
			//$item_output .= , apply_filters( 'the_title', $item->title, $item->ID ), 1);
			$item_output .= '</a>';

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}











	class AM_Walker_FooterAward extends Walker_Nav_Menu {
		/**
		 * @see Walker::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param int $current_page Menu item ID.
		 * @param object $args
		 */
		function start_el(&$output, $item, $depth, $args) {
			global $wp_query;


			$output .='<li class="sideStripes-light '.reset($item->classes).'">';

			$item_output .= '<span class="awardIcon ir">'.apply_filters( 'the_title', $item->title, $item->ID ).'</span>';
			$item_output .= '<span>'.esc_attr( $item->attr_title ).'</span>';

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
