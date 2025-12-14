<?php
/*
@Package Tamim-personal
====================================
        ADMIN MENU PAGE
====================================
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 1️⃣ Admin Menu Register
 */
function tamim_theme_option_menus() {
//MAIN MENU
    //add_submenu_page( $parent_slug:string, $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $callback:callable, $position:integer|float|null )
    add_menu_page('Theme Options','TAMIM','manage_options','tamim_theme_options','tamim_theme_options_page',get_template_directory_uri() . '/img/small-logo.png',90);
//SUB-MENU
    //add_submenu_page( $parent_slug:string, $page_title:string, $menu_title:string, $capability:string, $menu_slug:string, $callback:callable, $position:integer|float|null )
    add_submenu_page('tamim_theme_options','General Settings','General','manage_options','tamim_theme_options','tamim_theme_options_page_cb');
    add_submenu_page('tamim_theme_options','Header Settings','Header','manage_options','tamim_header_options','tamim_header_options_page_cb');
    add_submenu_page('tamim_theme_options','Footer Settings','Footer','manage_options','tamim_footer_options','tamim_footer_options_page_cb');
    add_submenu_page('tamim_theme_options','Home Page Settings','Home Page','manage_options','tamim_homepage_options','tamim_homepage_options_page_cb');
}

add_action('admin_menu', 'tamim_theme_option_menus');

/**
 * 2️⃣ Slice All Function to Page Related Php File 
 */
//Genarel Page Related Code Linkup
require_once get_template_directory() . '/functions/theme_option/genarel_setting.php';
//Header Page Related Code Linkup
require_once get_template_directory() . '/functions\theme_option\header_setting.php';
//Footer Page Related Code Linkup
require_once get_template_directory() . '/functions\theme_option\footer_setting.php';
//Home Page Related Code Linkup
require_once get_template_directory() . '/functions\theme_option\home_page.php';


// Load media uploader scripts for all admin pages
function tamim_load_admin_media() {
    if (is_admin()) {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'tamim_load_admin_media');