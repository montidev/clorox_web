<?php

global $meta_boxes;

$meta_boxes[PRODUCT_CLASS_MB] = array(
  'id'            => PRODUCT_CLASS_MB,
  'title'         => __( 'Destacado', 'clorox' ),
  'object_types'  => array( 'product-class' ),
  'context'       => 'normal',
  'priority'      => 'high',
  'show_names'    => true, // Show field names on the left
  'fields'        => array(
    array(
      'id' => PRODUCT_CLASS_MB_IMAGES,
      'description' => __( 'Imágenes de la clase', 'clorox' ),
      'type' => 'group',
      'options'     => array(
        'group_title'   => __( 'Imagen {#}', 'clorox' ),
        'add_button'    => __( 'Agregar otra imagen', 'clorox' ),
        'remove_button' => __( 'Remover imagen', 'clorox' ),
      ),
      'fields' => array(
        array(
          'name'  => __('Imagen', 'clorox' ),
          'id'    => PRODUCT_CLASS_MB_IMAGES_IMAGE,
          'type'  => 'file',
          'row_classes' => 'col-md-6',
          'options' => array(
            'url' => false,
          ),
        ),
        array(
          'name'  => __('Tipo', 'clorox' ),
          'id'    => PRODUCT_CLASS_MB_IMAGES_TYPE,
          'type'  => 'select',
          'row_classes' => 'col-md-6',
          'options' => array(
            'light-bg' => __('Para fondo claro', 'clorox'),
            'dark-bg' => __('Para fondo oscuro', 'clorox'),
          )
        ),
      ),
    ),

  )
);