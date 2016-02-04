<?php

$prefix = PREFIX . 'homepage_metabox';
$prefix_slider = $prefix . '_slider';

function is_page_admin_home($cmb) {
  $post = get_post($cmb->object_id);
  return ( ($post->post_type == 'page') && ($post->post_name == 'home') );
}

// Homepage
$homepage = new_cmb2_box( array(
  'id'            => $prefix,
  'title'         => __( 'Destacado', 'clorox' ),
  'object_types'  => array( 'page', ),
  'show_on_cb'    => 'is_page_admin_home',
  'context'       => 'normal',
  'priority'      => 'high',
  'show_names'    => true, // Show field names on the left
));

$slider = $homepage->add_field(array(
  'id'            => $prefix_slider,
  'type'          => 'group',
  'options'       => array(
    'group_title'   => __( 'Imágenes del slider', 'clorox' ),
    'add_button'    => __( 'Nueva Slide', 'clorox' ),
    'remove_button' => __( 'Remover Slide', 'clorox' ),
    'sortable'      => true,
    'repeatable'    => true,
  ),
));

$homepage->add_group_field( $slider, array(
  'name'  => __('Título destacado', 'clorox' ),
  'id'    => $prefix_slider . '_text',
  'type'  => 'text'
));

$homepage->add_group_field( $slider, array(
  'name'  => __('Título destacado', 'clorox' ),
  'id'    => $prefix_slider . '_image',
  'type'  => 'file'
));
