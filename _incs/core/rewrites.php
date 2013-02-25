<?php
/**
 * @package WordPress
 * @subpackage themename
 */

/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 */

function roots_add_rewrites($content) {
  $theme_name = next(explode('/themes/', get_stylesheet_directory()));
  global $wp_rewrite;
  $roots_new_non_wp_rules = array(
    '_incs/css/(.*)'      => 'wp-content/themes/'. $theme_name . '/_incs/css/$1',
    '_incs/js/(.*)'       => 'wp-content/themes/'. $theme_name . '/_incs/js/$1',
    '_incs/images/(.*)'   => 'wp-content/themes/'. $theme_name . '/_incs/images/$1',
    '_incs/fonts/(.*)'   => 'wp-content/themes/'. $theme_name . '/_incs/fonts/$1',
    '_incs/audio/(.*)'   => 'wp-content/themes/'. $theme_name . '/_incs/audio/$1',
    '_incs/ajax/(.*)'   => 'wp-content/themes/'. $theme_name . '/_incs/ajax/$1'
  );
  $wp_rewrite->non_wp_rules += $roots_new_non_wp_rules;
}

add_action('generate_rewrite_rules', 'roots_add_rewrites');

?>