<?php

// Loading CSS file
function login_enqueue_register(){
  wp_enqueue_style( 'login_enqueue', get_stylesheet_directory_uri(). "/css/login_enqueue.css", array(), "1.0.1", "all" );
}
add_action('login_enqueue_scripts', 'login_enqueue_register');

// Changing Login form logo
function login_logo_change(){
  ?>
  <style>
    #login h1 a, .login h1 a{
      background-image: url(<?php print get_stylesheet_directory_uri(); ?>../img/logo.png);
    }
  </style>

  <?php
}
add_action( 'login_enqueue_scripts', 'login_logo_change');

// Changing Login form logo url
function login_logo_url_change(){
  return home_url();
}
add_filter( 'login_headerurl', 'login_logo_url_change');


// ==========================Register Theme Customizer For Custom login Page =======================================

// Register Theme Customizer For login Page  Section 
function tamim_custom_login($wp_customize) {

    $wp_customize->add_panel('tamim_custom-login-panel', array(
        'title'       => __('Custom Login Panel', 'tamim-personal'),
        'description' => __('Customize Login Panel', 'tamim-personal'),
        'priority'    => 20,
    ));

    
    // ✅ Logo Section
    $wp_customize->add_section('tamim_logon-logo_section', array(
        'title'       => __('Custom login Logo Settings', 'tamim-personal'),
        'priority'    => 10,
        'panel'       => 'tamim_custom-login-panel',
    ));

    $wp_customize->add_setting('login_logo', array(
        'default'           => get_template_directory_uri() . '/img/logo.png',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'login_logo_control', array(
        'label'       => __('Upload Logo', 'tamim-personal'),
        'section'     => 'tamim_logon-logo_section',
        'settings'    => 'login_logo',
    )));
    
}
add_action('customize_register', 'tamim_custom_login');


// Theme Custom Login page Style

function tamim_custom_login_css() {
?>
<style>
    #login h1 a, .login h1 a{
      background-image: url(<?php print get_theme_mod("login_logo"); ?>) !important;
    }
</style>
<?php
}
add_action('login_enqueue_scripts', 'tamim_custom_login_css');

