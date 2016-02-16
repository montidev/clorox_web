<?php

global $meta_boxes;

$meta_boxes[PRODUCT_TYPE_MB] = array(
  'id'            => PRODUCT_TYPE_MB,
  'title'         => __( 'Metadatos', 'clorox' ),
  'object_types'  => array( 'product-type' ),
  'context'       => 'normal',
  'priority'      => 'high',
  'show_names'    => true, // Show field names on the left
  'fields'        => array(
    array(
      'name'  => __('Verbo', 'clorox' ),
      'id'    => PRODUCT_TYPE_MB_VERB,
      'type'  => 'text',
    )
  )
);
