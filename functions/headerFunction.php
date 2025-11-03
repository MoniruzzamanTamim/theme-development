<?php

// =========================================== Register Theme Customizer For Header Section =========================

function tamim_customize_register_main($wp_customize) {

    // ✅ Panel for Header-related Options
    $wp_customize->add_panel('tamim_header_panel', array(
        'title'       => __('Header Section', 'tamim-personal'),
        'description' => __('Customize header, logo, menu, and CV.', 'tamim-personal'),
        'priority'    => 10,
    ));

    // ✅ Logo Section
    $wp_customize->add_section('tamim_logo_section', array(
        'title'       => __('Logo Settings', 'tamim-personal'),
        'priority'    => 10,
        'panel'       => 'tamim_header_panel',
    ));

    $wp_customize->add_setting('header_logo', array(
        'default'           => get_template_directory_uri() . '/img/logo.png',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'header_logo_control', array(
        'label'       => __('Upload Logo', 'tamim-personal'),
        'section'     => 'tamim_logo_section',
        'settings'    => 'header_logo',
    )));

/// =========================
// ✅ Menu Position Customizer
// =========================
$wp_customize->add_section('tamim_menu_section', array(
    'title'       => __('Menu Settings', 'tamim-personal'),
    'priority'    => 20,
    'panel'       => 'tamim_header_panel', // যদি panel না থাকে, তাহলে এটা বাদ দিতে পারো
));

$wp_customize->add_setting('menu_position_change', array(
    'default'           => 'center',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('menu_position_change', array(
    'label'    => __('Menu Position', 'tamim-personal'),
    'section'  => 'tamim_menu_section',
    'settings' => 'menu_position_change',
    'type'     => 'radio',
    'choices'  => array(
        'left'   => __('Left', 'tamim-personal'),
        'center' => __('Center', 'tamim-personal'),
        'right'  => __('Right', 'tamim-personal'),
    ),
));


    // ✅ CV Upload Section
    $wp_customize->add_section('tamim_cv_section', array(
        'title'       => __('CV Upload', 'tamim-personal'),
        'priority'    => 30,
        'panel'       => 'tamim_header_panel',
    ));

    $wp_customize->add_setting('cv_pdf_file', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'cv_pdf_file', array(
        'label'     => __('Upload CV (PDF)', 'tamim-personal'),
        'section'   => 'tamim_cv_section',
        'settings'  => 'cv_pdf_file',
        'mime_type' => 'application/pdf',
    )));
}
add_action('customize_register', 'tamim_customize_register_main');

// =================== Menu  Configure ================================
register_nav_menu( 'main_menu', __( 'main Menu', 'tamim-personal' ) );