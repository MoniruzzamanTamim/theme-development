<?php
/*
@Package TAMIM Theme
====================================
        PAGE SETTING FUNCTION
====================================
*/
?>

<?php

// Add a custom meta box for layout selection
function custom_meta_box_layout_control() {
    add_meta_box(
        'layout_control_meta_box', // ID
        'Page Layout',              // Title
        'display_layout_control',   // Callback function
        'page',                     // Post type (page)
        'side',                     // Context (side or normal)
        'default'                   // Priority
    );
}
add_action('add_meta_boxes', 'custom_meta_box_layout_control');

// Callback function to display the meta box content
function display_layout_control($post) {
    // Retrieve the current value of the layout option (if any)
    $layout_option = get_post_meta($post->ID, '_page_layout', true);
    ?>
    <label for="page_layout">Select Page Layout</label>
    <select name="page_layout" id="page_layout">
        <option value="full-width" <?php selected($layout_option, 'full-width'); ?>>Full Width</option>
        <option value="boxed" <?php selected($layout_option, 'boxed'); ?>>Boxed</option>
    </select>
    <?php
}

// Save the meta box data
function save_layout_control_meta_box($post_id) {
    if (array_key_exists('page_layout', $_POST)) {
        update_post_meta($post_id, '_page_layout', $_POST['page_layout']);
    }
}
add_action('save_post', 'save_layout_control_meta_box');

// Breadcrumb Related Code Start Here==================================
// ================= Add Breadcrumb Meta Box =================
function tamim_add_breadcrumb_metabox() {
    add_meta_box(
        'tamim_breadcrumb_box',              // ID
        __('Breadcrumb Settings', 'tamim'),  // Title
        'tamim_breadcrumb_meta_callback',    // Callback
        'page',                              // Post Type (Page)
        'side',                              // Position
        'default'                            // Priority
    );
}
add_action('add_meta_boxes', 'tamim_add_breadcrumb_metabox');

// ================= Meta Box Field Output =================
function tamim_breadcrumb_meta_callback($post) {
    // নন্স ফিল্ড (security)
    wp_nonce_field('tamim_breadcrumb_save_data', 'tamim_breadcrumb_meta_nonce');

    // আগের সেভ করা ভ্যালু পাওয়া
    $value = get_post_meta($post->ID, '_tamim_show_breadcrumb', true);
    ?>
    <p>
        <label for="tamim_show_breadcrumb">
            <input type="checkbox" name="tamim_show_breadcrumb" id="tamim_show_breadcrumb" value="1" <?php checked($value, '1'); ?> />
            <?php _e('Show Breadcrumb on this Page', 'tamim'); ?>
        </label>
    </p>
    <?php
}

// ================= Save Meta Box Data =================
function tamim_breadcrumb_save_data($post_id) {
    // নন্স চেক করা
    if (!isset($_POST['tamim_breadcrumb_meta_nonce']) || !wp_verify_nonce($_POST['tamim_breadcrumb_meta_nonce'], 'tamim_breadcrumb_save_data')) {
        return;
    }

    // অটোসেভ নয়
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // পারমিশন চেক করা
    if (isset($_POST['post_type']) && 'page' === $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return;
        }
    }

    // ভ্যালু সেভ করা
    $show_breadcrumb = isset($_POST['tamim_show_breadcrumb']) ? '1' : '';
    update_post_meta($post_id, '_tamim_show_breadcrumb', $show_breadcrumb);
}
add_action('save_post', 'tamim_breadcrumb_save_data');

// Breadcrumb Related Code END  Here==================================

// =====================================
//Page Title  Related Code Start   Here
// ==================================
// Add Meta Box
function tamim_page_title_meta_box() {
    add_meta_box(
        'tamim_page_title_meta',        // ID
        __('Page Title Options', 'tamim-personal'), // Title
        'tamim_page_title_meta_box_html',         // Callback
        'page',                        // Screen (page)
        'side',                        // Context (side, normal)
        'default'                      // Priority
    );
}
add_action('add_meta_boxes', 'tamim_page_title_meta_box');

// Meta Box HTML
function tamim_page_title_meta_box_html($post) {
    $value = get_post_meta($post->ID, '_tamim_show_page_title', true);
    ?>
    <label for="tamim_show_page_title">
        <input type="checkbox" name="tamim_show_page_title" id="tamim_show_page_title" value="1" <?php checked($value, '1'); ?> />
        <?php _e('Show Page Title', 'tamim-personal'); ?>
    </label>
    <?php
}

// Save Meta Box Value
function tamim_save_page_title_meta($post_id) {
    if (array_key_exists('tamim_show_page_title', $_POST)) {
        update_post_meta($post_id, '_tamim_show_page_title', '1');
    } else {
        update_post_meta($post_id, '_tamim_show_page_title', '0');
    }
}
add_action('save_post', 'tamim_save_page_title_meta');
// Page Title  Related Code End   Here==================================


