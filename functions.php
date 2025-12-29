<?php
/*
@Package TAMIM Theme
====================================
        MAIN FUNCTION  FILE
====================================
*/
?>

<?php
/**
 * Backward compatibility for deprecated author description
 */
if ( ! function_exists( 'the_author_description' ) ) {
    function the_author_description() {
        echo esc_html( get_the_author_meta( 'description' ) );
    }
}


// =======================================================
// Website Title &  Default Theme Function 
include_once('functions/default.php');
// =======================================================

// =======================================================
// / Linkup Additional CSS & JS Bootstrap & Custom, FontAwesome & etc. for Theme
include_once('functions/link_file.php');
// =======================================================

// THEME CUSTOMIZER RELATED ENQUEUE......................................................
// ======================================================================
// Register Theme Customizer For Header Section 
include_once('functions/theme_customizer/headerFunction.php');
// =======================================================

// ======================================================================
//For Register Theme Customizer For Footer Section 
include_once('functions/theme_customizer/footerFunction.php');
// =======================================================
// ======================================================================
//Theme Color Customize Option 
include_once('functions/theme_customizer/themecolor.php');
// =======================================================
// =======================================================
// Login Page  Enqueue Register
include_once('functions/theme_customizer/login-enqueue.php');
// =======================================================
// =======================================================
// Home Page  Enqueue Register
include_once('functions/theme_customizer/homeFunction.php');
// =======================================================
// ======================================================================
//Page Setting for Page Relate Code metabox..................................
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

//Custom Post ==================================================
include_once('functions/custompost.php');
// =======================================================

//Create Short Code
include_once('functions/shortcode.php');
// =======================================================

//Create Short Code with pagination
include_once('functions/shortcodes.php');

// =======================================================
// Wordpress Theme option
// include_once('functions/themeoption.php');
// =======================================================
// Wordpress Theme option
include_once('functions/theme_option/theme_options.php');
// =======================================================

?>