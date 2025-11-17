<?php

// ========================= Linkup Additional CSS & JS  Font-Awesome, BootStrap, And Others Link ================================
function link_css_js() {
    // 1) Link Main style.css File
    wp_enqueue_style('wp-style', get_stylesheet_uri()); // style.css File Link

    // 2) Link Google Font (Rajdhani)
    wp_enqueue_style('google-font-rajdhani','https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&display=swap',array(),null);
    wp_enqueue_style('google-font-rajdhani','https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"',array(),null);

    // 3) Link Bootstrap CSS File
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3', 'all');

    // 4) Link Owl Carousel CSS File
    wp_enqueue_style('owl_carousel', get_template_directory_uri() . '/css/owl/owl.carousel.min.css', array(), '2.3.4', 'all');
    wp_enqueue_style('owl_theme_default', get_template_directory_uri() . '/css/owl/owl.theme.default.min.css', array(), '2.3.4', 'all');

    // 5) Link Custom CSS File
    wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('home_page', get_template_directory_uri() . '/css/homepage.css', array(), '1.0.0', 'all');
    wp_enqueue_style('header_footer', get_template_directory_uri() . '/css/headerFooter.css', array(), '1.0.0', 'all');

    // 6) Enqueue Font Awesome (CDN)
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css', array(), '6.5.0');

    // 7) jQuery (WordPress default version)
    wp_enqueue_script('jquery');

    // 8) Bootstrap JS CDN
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.3', true);

    // 9) Link Owl Carousel JS File
    wp_enqueue_script('owl_carousel_js', get_template_directory_uri() . '/js/owl/owl.carousel.min.js', array('jquery'), '2.3.4', true);

    // 10) Custom JS
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'link_css_js',20);
