<?php


$tip = new_cmb2_box( array(
  'id'            => TIP_MB,
  'title'         => __( 'Información Adicional', 'clorox' ),
  'object_types'  => array( 'tip', ),
  'context'       => 'normal',
  'priority'      => 'high',
  'show_names'    => true, // Show field names on the left
));


$tip->add_field(array(
  'id'    => TIP_MB_VIDEO,
  'name'  => __('Como se usa', 'clorox' ),
  'desc' => __('Video de como se usa (link de youtube)', 'clorox' ),
  'type'  => 'oembed'
));

$tip->add_field( array(
    'name'        => __( 'Productos relacionados' ),
    'id'          => TIP_MB_PRODUCTS,
    'type'        => 'post_search_text', // This field type
    // post type also as array
    'post_type'   => 'product',
    // Default is 'checkbox', used in the modal view to select the post type
    'select_type' => 'checkbox',
    // Will replace any selection with selection from modal. Default is 'add'
    'select_behavior' => 'replace',
) );