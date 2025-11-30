<?php
// =======================================================
// Website Title &  Default Theme Function 
include_once('functions/default.php');
// =======================================================

// =======================================================
// / Linkup Additional CSS & JS Bootstrap & Custom, FontAwesome for Theme
include_once('functions/link_file.php');
// =======================================================

// ======================================================================
// Register Theme Customizer For Header Section 
include_once('functions/headerFunction.php');
// =======================================================

// ======================================================================
//For Register Theme Customizer For Footer Section 
include_once('functions/footerFunction.php');
// =======================================================
// ======================================================================
//Page Setting for Page Relate Code metabox
//For Control Page Width Customly
include_once('functions/pagesetting.php');
// =======================================================

// ======================================================================
//Blog Page Sections with Pagination
include_once('functions/blogpage.php');
// =======================================================
// ======================================================================
//Blog Page Sidebar S
include_once('functions/widget.php');
// =======================================================
// ======================================================================
//Theme Color Customize Option 
include_once('functions/themecolor.php');
// =======================================================
//Custom Post ==================================================
include_once('functions/custompost.php');
// =======================================================

//Create Short Code
include_once('functions/shortcode.php');
// =======================================================

//Create Short Code with pagination
include_once('functions/shortcodes.php');
// =======================================================
function custom_theme_scripts() {
    // main.js enqueue করা
    wp_enqueue_script(
        'custom-main', // script handle (unique নাম)
        get_template_directory_uri() . '/js/main.js', // JS file path
        array('jquery'), // dependencies (jQuery আগে লোড হবে)
        '1.0', // version
        true // true = footer এ load হবে
    );
}
add_action('wp_enqueue_scripts', 'custom_theme_scripts');
?>