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
		$excerpt_length = apply_filters('excerpt_length', 12);
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



//Ajax function to filter categories 

function get_related_prod_types_callback() {

	//primero hago un búsqueda general, traigo los post relacionados al término 

	//primero por product-type
	global $limit;
	global $wp_query;
	$type = '';
	$value = '';
	if(isset($_REQUEST['type']) ){
		$type = $_REQUEST['type'];
	}

	if(isset($_REQUEST['value']) ){
		$value = $_REQUEST['value'];
	}

	$filter = array();


	$typeSearch = '';
	if($type && $value) {
		if($type == 'product-type'){
			$filter['product-types'] = $value;		
			$typeSearch = 'category';
		} else if($type == 'category') {
			$filter['categories'] = $value;
			$typeSearch = 'product-type';
		}
		
	}
	
	get_products($limit, $filter);
	
	$tms = array();
	if(have_posts())
  {
    while(have_posts()) : the_post();
    		$args = array('fields' => 'slugs' );
  			$cats = wp_get_post_terms( get_the_ID(), $typeSearch, $args );
        $tms = array_merge($tms, $cats);
    endwhile;
  }


	

	header('Content-Type: application/json');
	echo json_encode(array( 'data' => array_values(array_unique($tms)), 'type' => $type)) ;
	die();
}

add_action('wp_ajax_get_related_prod_types', 'get_related_prod_types_callback');
add_action('wp_ajax_nopriv_get_related_prod_types', 'get_related_prod_types_callback');