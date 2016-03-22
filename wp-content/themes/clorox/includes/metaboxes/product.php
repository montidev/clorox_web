<?php

// Homepage
$product = new_cmb2_box( array(
  'id'            => PRODUCT_MB,
  'title'         => __( 'Información Adicional', 'clorox' ),
  'object_types'  => array( 'product', ),
  'context'       => 'normal',
  'priority'      => 'high',
  'show_names'    => true, // Show field names on the left
));

$product->add_field(array(
  'id'    => PRODUCT_MB_VIDEO,
  'name'  => __('Como se usa', 'clorox' ),
  'desc' => __('Video de como se usa (link de youtube)', 'clorox' ),
  'type'  => 'oembed'
));

$chars = $product->add_field(array(
  'id'            => PRODUCT_MB_CHARACS,
  'type'          => 'group',
  'options'       => array(
    'group_title'   => __( 'Características del Producto', 'clorox' ),
    'add_button'    => __( 'Nueva', 'clorox' ),
    'remove_button' => __( 'Remover', 'clorox' ),
    'sortable'      => true,
    'repeatable'    => true,
  ),
));

$product->add_group_field( $chars, array(
  'name'  => __('Imagen', 'clorox' ),
  'id'    => PRODUCT_MB_CHARAC_IMAGE,
  'type'  => 'file'
));

$product->add_group_field( $chars, array(
  'name'  => __('Descripción', 'clorox' ),
  'id'    => PRODUCT_MB_CHARAC_TEXT,
  'type'  => 'textarea'
));

$product->add_field( array(
    'name'        => __( 'Productos relacionados' ),
    'id'          => PRODUCT_MB_PRODUCTS,
    'type'        => 'post_search_text', // This field type
    // post type also as array
    'post_type'   => 'product',
    // Default is 'checkbox', used in the modal view to select the post type
    'select_type' => 'checkbox',
    // Will replace any selection with selection from modal. Default is 'add'
    'select_behavior' => 'replace',
) );
