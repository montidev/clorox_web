<?php

add_action( 'init', 'clorox_create_post_types' );

function clorox_create_post_types() {
  // TIP
  register_post_type( 'tip',
    array(
      'labels' => array(
        'name' => __( 'Tips', 'clorox' ),
        'singular_name' => __( 'Tip', 'clorox' )
      ),
      'show_ui' => true,
      'public' => true,
      'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );

  // PRODUCT
  register_post_type( 'product',
    array(
      'labels' => array(
        'name' => __( 'Productos', 'clorox' ),
        'singular_name' => __( 'Producto', 'clorox' )
      ),
      'show_ui' => true,
      'public' => true,
      'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );

  register_post_type( 'campaign',
    array(
      'labels' => array(
        'name' => __( 'Campañas', 'clorox' ),
        'singular_name' => __( 'Campaña', 'clorox' )
      ),
      'show_ui' => true,
      'public' => true,
      'supports' => array( 'title', 'editor', 'thumbnail' )
    )
  );

  // PRODUCT-TIP CATEGORIES
  register_taxonomy( 'category', array( 'product', 'tip' ),
    array(
      'labels'            => array(
        'name'              => __( 'Categorías', 'clorox' ),
        'singular_name'     => __( 'Categoría del producto', 'clorox' ),
      )
    )
  );

  // PRODUCT TYPE
  register_taxonomy( 'product-type', array( 'product' ),
    array(
      'labels'            => array(
        'name'            => __( 'Tipos', 'mobext' ),
        'singular_name'   => __( 'Tipo del producto', 'clorox' ),
        'add_new_item'    => __('Agregar nuevo tipo', 'clorox')
      )
    )
  );


  register_taxonomy( 'product-class', array( 'product'),
    array(
      'labels'            => array(
        'name'            => __( 'Clases', 'clorox' ),
        'singular_name'   => __( 'Clase del producto', 'clorox' ),
        'add_new_item'    => __( ' Agregar nueva clase ', 'clorox')
      )
    )
  );

};


