<?php

global $meta_boxes;

$meta_boxes[CATEGORY_MB] = array(
  'id'            => CATEGORY_MB,
  'title'         => __( 'Destacado', 'clorox' ),
  'object_types'  => array( 'category' ),
  'context'       => 'normal',
  'priority'      => 'high',
  'show_names'    => true, // Show field names on the left
  'fields'        => array(
    array(
      'id' => CATEGORY_MB_IMAGES,
      'description' => __( 'Imágenes de la categoría', 'clorox' ),
      'type' => 'group',
      'options'     => array(
        'group_title'   => __( 'Imagen {#}', 'clorox' ),
        'add_button'    => __( 'Agregar otra imagen', 'clorox' ),
        'remove_button' => __( 'Remover imagen', 'clorox' ),
      ),
      'fields' => array(
        array(
          'name'  => __('Imagen', 'clorox' ),
          'id'    => CATEGORY_MB_IMAGES_IMAGE,
          'type'  => 'file',
          'row_classes' => 'col-md-6',
          'options' => array(
            'url' => false,
          ),
        ),
        array(
          'name'  => __('Tipo', 'clorox' ),
          'id'    => CATEGORY_MB_IMAGES_TYPE,
          'type'  => 'select',
          'row_classes' => 'col-md-6',
          'options' => array(
            'light-bg' => __('Para fondo claro', 'clorox'),
            'dark-bg' => __('Para fondo oscuro', 'clorox'),
          )
        ),
      ),
    ),
    array(
      'id' => CATEGORY_MB_DESTACADOS,
      'description' => __( 'Produtos destacados de la categoría', 'clorox' ),
      'type' => 'group',
      'options'     => array(
        'group_title'   => __( 'Producto {#}', 'clorox' ),
        'add_button'    => __( 'Agregar otro producto', 'clorox' ),
        'remove_button' => __( 'Remover producto', 'clorox' ),
        // 'sortable' => true,
      ),
      'fields' => array(
        array(
          'name'  => __('Producto', 'clorox' ),
          'id'    => CATEGORY_MB_PRODUCTS_DESTACADOS,
          'row_classes' => 'col-md-6',
          'type'        => 'select', 
          'options_cb' => 'cmb2_get_product_options',
        ),
      ),
    ),

  )
);
