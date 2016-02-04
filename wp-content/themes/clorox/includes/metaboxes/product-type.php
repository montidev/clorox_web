<?php

global $meta_boxes;

$key = PREFIX . 'metabox_product_type';

$meta_boxes[$key] = array(
  'id'            => $key,
  'title'         => __( 'Metadatos', 'clorox' ),
  'object_types'  => array( 'product-type' ),
  'context'       => 'normal',
  'priority'      => 'high',
  'show_names'    => true, // Show field names on the left
  'fields'        => array(
    array(
      'name'  => __('Verbo', 'clorox' ),
      'id'    => $key . '_verb',
      'type'  => 'text',
    )
  )
);
