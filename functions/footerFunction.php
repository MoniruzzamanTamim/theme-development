<?php


// ==========================Register Theme Customizer For Footer Section =======================================

// Register Theme Customizer For Footer Section 
function tamim_customize_register_footer($wp_customize) {

    // ✅ Separate Panel for Footer Options
    $wp_customize->add_panel('tamim_footer_panel', array(
        'title'       => __('Footer Section', 'tamim-personal'),
        'description' => __('Customize footer text and layout.', 'tamim-personal'),
        'priority'    => 20,
    ));

    // ✅ Footer Section
    $wp_customize->add_section('tamim_footer_section', array(
        'title'       => __('Copywrite Setting', 'tamim-personal'),
        'priority'    => 10,
        'panel'       => 'tamim_footer_panel',
    ));

    // ✅ Toggle to Enable/Disable Footer
    $wp_customize->add_setting('show_footer_section', array(
        'default'           => true,
        'sanitize_callback' => 'tamim_sanitize_checkbox',
    ));

    $wp_customize->add_control('show_footer_section', array(
        'label'       => __('Show Footer Section', 'tamim-personal'),
        'section'     => 'tamim_footer_section',
        'type'        => 'checkbox',
        'description' => __('Enable or disable the footer section.', 'tamim-personal'),
    ));

    // ✅ Footer Text
    $wp_customize->add_setting('footer_content', array(
        'default'           => '© Moniruzzaman Tamim | 2025',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_content', array(
        'label'       => __('Footer Text', 'tamim-personal'),
        'description' => __('Enter your footer copyright.', 'tamim-personal'),
        'section'     => 'tamim_footer_section',
        'settings'    => 'footer_content',
        'type'        => 'text',
        'active_callback' => 'tamim_show_footer_callback',
    ));

    // ✅ Footer Link (URL)
    $wp_customize->add_setting('footer_link', array(
        'default'           => 'https://yourwebsite.com',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('footer_link', array(
        'label'       => __('Footer Link', 'tamim-personal'),
        'description' => __('Link to your website or profile.', 'tamim-personal'),
        'section'     => 'tamim_footer_section',
        'settings'    => 'footer_link',
        'active_callback' => 'tamim_show_footer_callback',
    ));
}
add_action('customize_register', 'tamim_customize_register_footer');

// ✅ Helper Functions  Footer
function tamim_sanitize_checkbox($checked) {
    return (isset($checked) && $checked === true) ? true : false;
}

function tamim_show_footer_callback() {
    return get_theme_mod('show_footer_section', true);
}
