<?php
/**
 * Module Name: Top Nav HTML
 *
 * @package <theme name>
 * @since 1.0
 */


/**
 * prepares header HTML
 *
 * @param bool    $hasSearch    renders HTML form and responsive toggler
 * @param bool    $echo         return or display?
 * @param string  $type         nav type ['dropdown'|'offcanvas']
 * @param string  $topNavName   Menu name to use
 *
 * @return string               if $echo variable set to false
 */


function cgy_get_header_html($hasSearch=false, $quickContact=false, $echo=true, $type="dropdown", $topNavName='Top Navigation'){

  $togglerHTML = '<input id="topNavInput"  class="toggler" name="isMenuOpen" type="checkbox" />';
  $togglerHTML.= '<label for="topNavInput" id="topNavToggler" onclick=""></label>';

  $headerHTML  = '';

  //if($type==='offcanvas'){
  //	$headerHTML.=$togglerHTML;
  //}

  $headerHTML.= '<header id="header" role="banner" '.( is_front_page() || is_home() ? '' : 'class="topNav-extraPadded"' ).'>';
  $headerHTML.=   '<a id="logo" href="/">';
  $headerHTML.=     '<h1 id="logoImage"  ><img src="/_incs/images/aardvark-media-logo.svgz" alt="'. get_post_snippet('Company Name') .'" /></h1>';
  $headerHTML.=   '</a>';


  $headerHTML.=   '<nav class="topNav" role="navigation">';




  /* --------------------------------------------------------------
   * TOPNAV TOGGLER
   * -------------------------------------------------------------- */
  $headerHTML.=     '<div id="topNav-bar" class="panel-fill"></div>';
  //if($type==='dropdown'){
  $headerHTML.=$togglerHTML;
  //}



  /* --------------------------------------------------------------
   * SEARCH
   * -------------------------------------------------------------- */
  if($hasSearch){
    $headerHTML.=   '<input id="topNavSearchInput" class="toggler" name="isSearchOpen" type="checkbox" />';
    $headerHTML.=   '<label for="topNavSearchInput" id="searchToggler" onclick=""></label>';
    $headerHTML.=   '<form method="get" id="searchform" action="'. esc_url( home_url( '/' ) ) .'" role="search">';
    $headerHTML.=     '<input type="search" name="s" id="s" placeholder="'. get_post_snippet( 'Search' ) .'" />';
    $headerHTML.=     '<button type="submit" class="submit ir" name="submit" id="searchSubmit">'. get_post_snippet( 'Search' ) .'</button>';
    $headerHTML.=   '</form>';
  }



  /* --------------------------------------------------------------
   * QUICK CONTACT
   * -------------------------------------------------------------- */
  if($quickContact){
    $headerHTML.=   '<label data-toggle="collapse" id="quickContactToggler" class="buttonIcon-contact" for="isQuickContactOpen" onclick="">Contact</label>';
  }



  /* --------------------------------------------------------------
   * TOP NAV
   * -------------------------------------------------------------- */

  $headerHTML.=     wp_nav_menu( array(
    'container'       => false,
    'items_wrap'      => '<ol class="inlineBlockList topNav-links'.(is_home() || is_front_page() ? '' : ' topNav-padded').'">%3$s</ol>',
    'walker'          => new CGY_Walker_Nav_Menu(),
    'menu'            => $topNavName,
    'echo'            => false
  ));


  $headerHTML.=   '</nav>';
  $headerHTML.= '</header>';

  if($echo) echo    $headerHTML;
  else      return  $headerHTML;
}

?>