<?php
/*
@Package TAMIM Theme
====================================
        HEADER  Template
====================================
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); // Required for Elementor and JS ?>
</head>

<body <?php body_class(); ?>>
<?php
// Get header settings from our custom options
$tamim_options = get_option('tamims_options');

// Logo settings
$header_logo_url = isset($tamim_options['header_logo']) ? $tamim_options['header_logo'] : '';
$mobile_logo_url = isset($tamim_options['header_mobile_logo']) ? $tamim_options['header_mobile_logo'] : '';

// Use mobile logo if available, otherwise use desktop logo for mobile
$desktop_logo = $header_logo_url;
$mobile_logo = !empty($mobile_logo_url) ? $mobile_logo_url : $desktop_logo;

// Menu settings
$selected_menu = isset($tamim_options['header_menu']) ? $tamim_options['header_menu'] : '';

// Button settings
$header_btn_enable = isset($tamim_options['header_btn_enable']) ? $tamim_options['header_btn_enable'] : '1';
$cv_file_url = isset($tamim_options['cv_file']) ? $tamim_options['cv_file'] : '';
$button_text = isset($tamim_options['header_button_text']) ? $tamim_options['header_button_text'] : 'Download CV';

// Generate secure download URL if CV exists
$cv_file_url = 'https://example.com/uploads/cv.pdf';

if (!empty($cv_file_url)) {
    $download_cv_url = add_query_arg(
        array(
            'tamim_download_cv' => '1',
            'file'  => esc_url_raw($cv_file_url),
            'nonce' => wp_create_nonce('tamim_download_cv'),
        ),
        home_url('/')
    );
}


// Check if button should be shown
$show_button = ($header_btn_enable == '1' && !empty($cv_file_url));
?>

<header class="header-section px-3 <?php echo esc_attr(get_theme_mod('menu_position_change', 'center')); ?>">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- LOGO -->
            <div class="col-xl-3 col-lg-3 col-md-2 col-sm-6 col-6 header_column_one">
                <div class="header-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <?php if (!empty($desktop_logo)): ?>
                            <!-- Desktop Logo (shown on medium screens and up) -->
                            <img src="<?php echo esc_url($desktop_logo); ?>" 
                                 alt="<?php echo esc_attr(get_bloginfo('name')); ?>" 
                                 class="d-none d-md-block header-logo-image">
                            
                            <!-- Mobile Logo (shown on small screens) -->
                            <img src="<?php echo esc_url($mobile_logo); ?>" 
                                 alt="<?php echo esc_attr(get_bloginfo('name')); ?>" 
                                 class="d-block d-md-none">
                        <?php else: ?>
                            <!-- Fallback: Site Title -->
                            <span class="site-title"><?php bloginfo('name'); ?></span>
                        <?php endif; ?>
                    </a>
                </div>
            </div>

            <!-- MENU -->
            <div class="col-xl-7 col-md-7 col-lg-7 col-sm-2 col-2 header_column_two">
                <nav class="header-menu">
                    <?php 
                    if (!empty($selected_menu)) {
                        // Use menu from our settings
                        wp_nav_menu(array(
                            'menu' => $selected_menu,
                            'menu_class' => 'nav-menu list-unstyled d-flex justify-content-center m-0'
                        ));
                    } else {
                        // Fallback to WordPress theme location
                        wp_nav_menu(array(
                            'theme_location' => 'main_menu',
                            'menu_class' => 'nav-menu list-unstyled d-flex justify-content-center m-0'
                        ));
                    }
                    ?>
                </nav>
            </div>

            <!-- EXTRA BUTTON - Show only when enabled -->
            
            <div class="col-xl-2 col-lg-2 col-md-3 d-none d-md-block text-end header_column_three">
                <div class="header-extra">
                    <a href="<?php echo esc_url($download_cv_url); ?>" 
                       class="download-cv-button btn btn-primary" 
                       download>
                        <?php echo esc_html($button_text); ?>
                    </a>
                </div>
            </div>
       
            
            <!-- Mobile Menu Icon (যেমনটি ছিল) -->
            <!-- আপনার header.php এর mobile icon অংশে এই কোডটি ব্যবহার করুন -->
<div class="d-block d-md-none col-sm-4 col-4 text-end">
    <div class="header-menu-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/img/menu-icon.png" 
             alt="Menu Icon"
             style="cursor: pointer;">
    </div>
</div>

        </div>
    </div>
</header>



<!-- Header CSS From Theme option -->

<?php
    $options = get_option('tamims_options');
    $header_bg_color = $options['header_bg_color'] ?? '#1a1a1a';
    $header_logo_color = $options['logo_title_color'] ?? '#ffffffff';
    $header_menu_text_color = $options['menu_text_color'] ?? '#ffffffff';
    $header_menu_text_hover = $options['menu_hover_color'] ?? '#ffffffff';
    $header_menu_bg_color = $options['menu_bg_color'] ?? '#000000ff';
    $header_menu_bg_hover = $options['menu_hover_bg'] ?? '#ff014f';
    $header_menu_btn_bg = $options['button_bg_color'] ?? '#ff014f';
    $header_menu_btn_border = $options['button_border_color'] ?? '#ff014f';
    $header_menu_btn_text = $options['button_text_color'] ?? '#ffffffff';
    $header_menu_btn_bg_hover = $options['button_hover_bg'] ?? '#000000ff';
    $header_menu_btn_border_hover = $options['button_hover_border'] ?? '#ff014f';
    $header_menu_btn_text_hover = $options['button_hover_text'] ?? '#000000ff';
    $header_mobile_menu_bg = $options['mobile_menu_bg'] ?? '#ff014f';
    $header_mobile_menu_text = $options['mobile_menu_text'] ?? '#ff014f';

    ?>

    
    <style>
    
    </style>