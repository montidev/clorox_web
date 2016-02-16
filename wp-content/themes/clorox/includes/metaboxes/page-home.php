<?php

function is_page_admin_home($cmb) {
  $post = get_post($cmb->object_id);
  return ( ($post->post_type == 'page') && ($post->post_name == 'home') );
}

// Homepage
$homepage = new_cmb2_box( array(
  'id'            => HOMEPAGE_MB,
  'title'         => __( 'Destacado', 'clorox' ),
  'object_types'  => array( 'page', ),
  'show_on_cb'    => 'is_page_admin_home',
  'context'       => 'normal',
  'priority'      => 'high',
  'show_names'    => true, // Show field names on the left
));

$slider = $homepage->add_field(array(
  'id'            => HOMEPAGE_MB_SLIDER,
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
  'id'    => HOMEPAGE_MB_SLIDER_TEXT,
  'type'  => 'text'
));

$homepage->add_group_field( $slider, array(
  'name'  => __('Título destacado', 'clorox' ),
  'id'    => HOMEPAGE_MB_SLIDER_IMAGE,
  'type'  => 'file'
));
