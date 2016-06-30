<?php

add_action( 'cmb2_admin_init', 'clorox_register_meta_boxes' );
function clorox_register_meta_boxes() {

  require_once( __DIR__ . '/metaboxes/page-home.php' );
  require_once( __DIR__ . '/metaboxes/product.php' );
  require_once( __DIR__ . '/metaboxes/tip.php');
  require_once( __DIR__ . '/metaboxes/campaign.php');
}



add_filter('cmb2-taxonomy_meta_boxes', 'clorox_taxonomy_metaboxes');
function clorox_taxonomy_metaboxes (array $meta_boxes) {

  require_once( __DIR__ . '/metaboxes/category.php' );
  require_once( __DIR__ . '/metaboxes/product-class.php' );
  require_once( __DIR__ . '/metaboxes/product-type.php' );

  return $meta_boxes;
}

