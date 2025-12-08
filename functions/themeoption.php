<?php

// Wordpress Theme option Start here

    // add_menu_page( 
    //     $page_title:string, 
    //     $menu_title:string, 
    //     $capability:string, 
    //     $menu_slug:string, 
    //     $callback:callable, 
    //     $icon_url:string, 
    //     $position:integer|float|null 
    // )


function tamim_theme_option_menu() {

    add_menu_page(
        'Theme Option',       // Page Title
        'Theme Option',       // Menu Title
        'manage_options',     // Capability (admin only)
        'tamim-theme-option', // Menu Slug
        'tamim_theme_option_page', // Callback Function
        'dashicons-admin-generic', // Icon
        90                    // Position
    );
}
add_action('admin_menu', 'tamim_theme_option_menu');
