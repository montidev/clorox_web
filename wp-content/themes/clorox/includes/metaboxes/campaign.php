<?php


// Homepage
$campaign = new_cmb2_box( array(
  'id'            => CAMPAIGN_MB,
  'title'         => __( 'Campaña', 'clorox' ),
  'object_types'  => array( 'campaign', ),
  'context'       => 'normal',
  'priority'      => 'high',
  'show_names'    => true, // Show field names on the left
));

$slider = $campaign->add_field(array(
  'id'            => CAMPAIGN_MB_SLIDER,
  'type'          => 'group',
  'options'       => array(
    'group_title'   => __( 'Imágenes del slider', 'clorox' ),
    'add_button'    => __( 'Nueva Slide', 'clorox' ),
    'remove_button' => __( 'Remover Slide', 'clorox' ),
    'sortable'      => true,
    'repeatable'    => true,
  ),
));

$campaign->add_group_field( $slider, array(
  'name'  => __('Título destacado', 'clorox' ),
  'id'    => CAMPAIGN_MB_SLIDER_TEXT,
  'type'  => 'text'
));

$campaign->add_group_field( $slider, array(
  'name'  => __('Título destacado', 'clorox' ),
  'id'    => CAMPAIGN_MB_SLIDER_IMAGE,
  'type'  => 'file'
));


$campaign->add_field(array(
  'id'    => CAMPAIGN_MB_VIDEO,
  'name'  => __('Como se usa', 'clorox' ),
  'desc' => __('Video de como se usa (link de youtube)', 'clorox' ),
  'type'  => 'oembed'
));
$campaign->add_field( array(
    'name'        => __( 'Productos relacionados' ),
    'id'          => CAMPAIGN_MB_PRODUCTS,
    'type'        => 'post_search_text', // This field type
    // post type also as array
    'post_type'   => 'product',
    // Default is 'checkbox', used in the modal view to select the post type
    'select_type' => 'checkbox',
    // Will replace any selection with selection from modal. Default is 'add'
    'select_behavior' => 'replace',
) );
