<?php

// ========================= Linkup Additional CSS & JS  Font-Awesome, BootStrap, And Others Link ================================
function link_css_js() {

//1)  Link Main Style.css File 
    wp_enqueue_style( 'wp-style', get_stylesheet_uri()); #style.css File Link
//2)  Link Bootrtrap   css File 
    wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.css',array(), '5.3.0','all');
    wp_enqueue_style('bootstrap');
//3) Link Jquery Plugin CSS File
    wp_register_style('owl_carousel', get_template_directory_uri().'/css/owl/owl.carousel.min.css',array(), '2.3.4','all');
    wp_enqueue_style('owl_carousel');
    wp_register_style('owl_theme_default', get_template_directory_uri().'/css/owl/owl.theme.default.min.css',array(), '2.3.4','all');
    wp_enqueue_style('owl_theme_default');
//4) Link Custom CSS FILE
    wp_register_style('custom', get_template_directory_uri().'/css/custom.css',array(), '1.0.0','all');
    wp_enqueue_style('custom');
    wp_register_style('header_footer', get_template_directory_uri().'/css/headerFooter.css',array(), '1.0.0','all');
    wp_enqueue_style('header_footer');
//5)  Bootstrap CSS CDN
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3', 'all');
   
// jQuery (built-in)
    wp_enqueue_script('jquery');

// Bootstrap JS CDN
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), '5.3.3', true);
//Bootstrap JS 
wp_enqueue_script('bootstrap_custom_js', get_stylesheet_directory_uri() . '/js/bootstrap.js', array(), '2.3.4', true);

// Link Jquery Plugin js File
  wp_enqueue_script('owl_carousel_js', get_stylesheet_directory_uri() . '/js/owl/owl.carousel.min.js', array(), '2.3.4', true);

// Custom JS
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'link_css_js');
