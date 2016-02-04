<?php

global $meta_boxes;

$key = PREFIX . 'metabox_category';

$meta_boxes[$key] = array(
  'id'            => $key,
  'title'         => __( 'Destacado', 'clorox' ),
  'object_types'  => array( 'category' ),
  'context'       => 'normal',
  'priority'      => 'high',
  'show_names'    => true, // Show field names on the left
  'fields'        => array(
    array(
      'name'  => __('Imagen', 'clorox' ),
      'id'    => $key . '_image',
      'type'  => 'file',
    )
  )
);
