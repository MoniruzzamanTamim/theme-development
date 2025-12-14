<?php
/*
@Package TAMIM Theme
====================================
        GENERAL SETTINGS & SANITIZATION
====================================
*/



/**
 * 4️⃣ Sanitize Options
 */



// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Main sanitization function for ALL options
function tamims_registers_options_sanitizes($input) {
    $sanitized_input = array();
    
    // ====================
    // HEADER FIELDS
    // ====================
    
    // Sanitize checkboxes
    $sanitized_input['header_btn_enable'] = isset($input['header_btn_enable']) ? '1' : '0';
    $sanitized_input['copyright_enable'] = isset($input['copyright_enable']) ? '1' : '0';
    
    // Sanitize URLs
    $sanitized_input['header_logo'] = esc_url_raw($input['header_logo'] ?? '');
    $sanitized_input['header_mobile_logo'] = esc_url_raw($input['header_mobile_logo'] ?? '');
    $sanitized_input['cv_file'] = esc_url_raw($input['cv_file'] ?? '');
    
    // Sanitize text fields
    $sanitized_input['header_menu'] = sanitize_text_field($input['header_menu'] ?? '');
    $sanitized_input['header_button_text'] = sanitize_text_field($input['header_button_text'] ?? 'Download CV');
    
    // Sanitize header color fields
    $header_color_fields = array(
        'header_bg_color', 'logo_title_color', 'menu_text_color', 'menu_bg_color',
        'menu_hover_color', 'menu_hover_bg', 'button_bg_color', 'button_border_color',
        'button_text_color', 'button_hover_bg', 'button_hover_border', 'button_hover_text',
        'mobile_menu_bg', 'mobile_menu_text'
    );
    
    foreach ($header_color_fields as $field) {
        if (isset($input[$field])) {
            // Allow "transparent" value or sanitize hex color
            if ($input[$field] === 'transparent' || $input[$field] === '') {
                $sanitized_input[$field] = sanitize_text_field($input[$field]);
            } else {
                $sanitized_input[$field] = sanitize_hex_color($input[$field]);
            }
        } else {
            // Set defaults
            $defaults = array(
                'header_bg_color' => '#ffffff',
                'logo_title_color' => '#000000',
                'menu_text_color' => '#333333',
                'menu_bg_color' => 'transparent',
                'menu_hover_color' => '#0073aa',
                'menu_hover_bg' => 'transparent',
                'button_bg_color' => '#0073aa',
                'button_border_color' => '#0073aa',
                'button_text_color' => '#ffffff',
                'button_hover_bg' => '#005a87',
                'button_hover_border' => '#005a87',
                'button_hover_text' => '#ffffff',
                'mobile_menu_bg' => '#ff014f',
                'mobile_menu_text' => '#ffffff'
            );
            $sanitized_input[$field] = $defaults[$field] ?? '';
        }
    }
    
    // ====================
    // FOOTER FIELDS
    // ====================
    
    // Sanitize checkboxes
    $sanitized_input['top_footer_enable'] = isset($input['top_footer_enable']) ? '1' : '0';
    
    // Note: copyright_enable already sanitized above (shared with header)
    
    // Sanitize text fields
    $sanitized_input['footer_title'] = sanitize_text_field($input['footer_title'] ?? 'TAMIM');
    $sanitized_input['footer_address'] = sanitize_textarea_field($input['footer_address'] ?? '7 No Elephant Road, Dhaka');
    $sanitized_input['useful_links_title'] = sanitize_text_field($input['useful_links_title'] ?? 'Useful Links');
    $sanitized_input['quick_links_title'] = sanitize_text_field($input['quick_links_title'] ?? 'Quick Links');
    $sanitized_input['contact_title'] = sanitize_text_field($input['contact_title'] ?? 'Contact Information');
    $sanitized_input['contact_phone'] = sanitize_text_field($input['contact_phone'] ?? '01739820399');
    $sanitized_input['contact_email'] = sanitize_email($input['contact_email'] ?? 'tamimiqbal896@gmail.com');
    $sanitized_input['contact_address'] = sanitize_textarea_field($input['contact_address'] ?? '7 No Elephant Road, Dhaka');
    $sanitized_input['footer_copyright'] = sanitize_text_field($input['footer_copyright'] ?? '© 2025 TAMIM Theme. All rights reserved.');
    
    // Sanitize URLs
    $sanitized_input['footer_logo'] = esc_url_raw($input['footer_logo'] ?? '');
    
    // Sanitize menu selections
    $sanitized_input['useful_links_menu'] = absint($input['useful_links_menu'] ?? 0);
    $sanitized_input['quick_links_menu'] = absint($input['quick_links_menu'] ?? 0);
    
    // Sanitize footer color fields
    $footer_color_fields = array(
        'footer_bg_color', 'footer_text_color', 'footer_link_color'
    );
    
    foreach ($footer_color_fields as $field) {
        if (isset($input[$field])) {
            $sanitized_input[$field] = sanitize_hex_color($input[$field]);
        } else {
            // Set defaults
            $defaults = array(
                'footer_bg_color' => '#1a1a1a',
                'footer_text_color' => '#ffffff',
                'footer_link_color' => '#cccccc'
            );
            $sanitized_input[$field] = $defaults[$field] ?? '';
        }
    }
    
    return $sanitized_input;
}
