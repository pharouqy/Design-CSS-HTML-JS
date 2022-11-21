<?php
/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );
	// Load the stylesheet
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
	
}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );

/* Geolocalisation app pour kaya */
function add_theme_scripts() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
 
  wp_enqueue_style( 'leaflet', get_template_directory_uri() . '/css/leaflet.css', array(), '1.1', 'all');

  wp_enqueue_script( 'scriptLeaflet', get_template_directory_uri() . '/js/leaflet.js', array ( 'jquery' ), 1.1, true);

  wp_enqueue_script( 'scriptEsri', get_template_directory_uri() . '/js/esri-leaflet.js', array ( 'jquery' ), 1.1, true);

  wp_enqueue_style( 'geocoder', get_template_directory_uri() . '/css/esri-leaflet-geocoder.css', array(), '1.1', 'all');

  wp_enqueue_script( 'scriptGeocoder', get_template_directory_uri() . '/js/esri-leaflet-geocoder.js', array ( 'jquery' ), 1.1, true);
 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_head', 'add_theme_scripts' );