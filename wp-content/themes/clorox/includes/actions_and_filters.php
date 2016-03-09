<?php

// Hide toolbar
add_filter('show_admin_bar', '__return_false');

// Add support thumbnails
add_theme_support( 'post-thumbnails' );



function wp_new_excerpt($text)
{
	if ($text == ''){
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
		$text = strip_tags($text);
		$text = nl2br($text);
		$excerpt_length = apply_filters('excerpt_length', 10);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '...');
			$text = implode(' ', $words);
		}
	}
	return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_new_excerpt');



// Register Menu
add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'clorox' ) );
}



remove_action( 'admin_init', 'A2A_SHARE_SAVE_add_meta_box' );

// Adds new $_GET params
// add_filter( 'query_vars', 'add_query_vars_filter' );
// function add_query_vars_filter( $vars ){
//   $vars[] = "product-type";
//   return $vars;
// }
