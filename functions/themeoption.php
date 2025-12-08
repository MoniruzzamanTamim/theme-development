<?php

// Wordpress Theme option Start here


function tamim_theme_option_menu() {
// Add Admin Menu ............
 // add_menu_page( 
    //     $page_title:string, 
    //     $menu_title:string, 
    //     $capability:string, 
    //     $menu_slug:string, 
    //     $callback:callable, 
    //     $icon_url:string, OR Logo Image--> Size 20*20px
    //     $position:integer|float|null 
    // )
    add_menu_page('Theme Option','Theme Option','manage_options','tamim_theme_option','tamim_theme_option_page',get_template_directory_uri(). '/img/small-logo.png', 90);

    // ==============================Add Sub-Menu ............=============================
    // add_submenu_page(
    //          $parent_slug:string,
    //          $page_title:string, 
    //          $menu_title:string, 
    //          $capability:string, 
    //          $menu_slug:string, 
    //          $callback:callable, 
    //          $position:integer|float|null 
    //  )
    add_submenu_page('tamim_theme_option', 'Theme Option', 'Genarel','manage_options', 'tamim_theme_option','tamim_theme_option_page',0);
    add_submenu_page('tamim_theme_option', 'Header Setting', 'Header','manage_options', 'header_theme_option','header_theme_option_page',2);
    add_submenu_page('tamim_theme_option', 'Footer Setting', 'Footer','manage_options', 'footer_theme_option','footer_theme_option_page',3);
    
};
add_action('admin_menu', 'tamim_theme_option_menu');



// Menu Or Option Related Funcion

function tamim_theme_option_page(){
    //Custom Post ==================================================
    include_once(get_template_directory(). '/functions/theme_option/genarel_setting.php');
    // =======================================================
};
function header_theme_option_page(){
    include_once(get_template_directory(). '/functions/theme_option/header_setting.php');
};
function footer_theme_option_page(){
    include_once(get_template_directory(). '/functions/theme_option/footer_setting.php');
};

function tamim_simple_settings_init() {

    // 1. Register Setting (Database option)
    register_setting(
        'tamim_settings_group',   // Settings Group Name
        'tamim_address'           // Option Name
    );

    // 2. Add Section
    add_settings_section(
        'tamim_section',          // ID
        'Theme Basic Settings',   // Title
        'tamim_section_callback', // Description Callback
        'tamim_settings_page'     // Page Slug
    );

    // 3. Add Field inside Section
    add_settings_field(
        'tamim_address',                 // Field ID
        'Address Information',           // Label
        'tamim_address_field_callback',  // Field HTML Callback
        'tamim_settings_page',           // Page Slug
        'tamim_section'                  // Section ID
    );
}
add_action('admin_init', 'tamim_simple_settings_init');


// SECTION Description
function tamim_section_callback() {
    echo "<p>Update your basic theme options below.</p>";
}

// FIELD HTML
function tamim_address_field_callback() {
    $value = get_option('tamim_address');
    echo '<input type="text" name="tamim_address" value="' . esc_attr($value) . '" class="regular-text" placeholder="Enter your address" />';
}
