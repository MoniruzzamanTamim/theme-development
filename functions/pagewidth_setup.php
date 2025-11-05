<?php
// Page Width Control Here

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
