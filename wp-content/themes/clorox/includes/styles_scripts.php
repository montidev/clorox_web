<?php

add_action( 'wp_enqueue_scripts', 'theme_styles' );
add_action( 'wp_enqueue_scripts', 'theme_js' );

//Load the theme CSS
function theme_styles() {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bower_components/bootstrap/dist/css/bootstrap.min.css');
    wp_enqueue_style( 'bxslider', '//cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.css', array('bootstrap'));
    wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css', array('bxslider'));
    wp_enqueue_style( 'flagcss', get_template_directory_uri() . '/bower_components/flag-icon-css/css/flag-icon.min.css');
}

//Load the theme JS
function theme_js() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js', true, null);
    wp_enqueue_script('jquery');

    wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
    wp_enqueue_script( 'bxslider', '//cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.5/jquery.bxslider.min.js', array('bootstrapjs'), '4.2.5', true );
    wp_enqueue_script( 'breakpointjs', get_template_directory_uri() . '/assets/js/breakpoints.js');
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array('bxslider'), '1.0.0', true );
}
