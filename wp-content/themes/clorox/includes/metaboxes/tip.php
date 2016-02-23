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