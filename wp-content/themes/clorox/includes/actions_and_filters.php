<?php

// Hide toolbar
add_filter('show_admin_bar', '__return_false');

// Add support thumbnails
add_theme_support( 'post-thumbnails' );

// limit the_excerpt()
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function custom_excerpt_length( $length ) {
	return 12;
}

// Register Menu
add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'clorox' ) );
}

// Adds new $_GET params
// add_filter( 'query_vars', 'add_query_vars_filter' );
// function add_query_vars_filter( $vars ){
//   $vars[] = "product-type";
//   return $vars;
// }
