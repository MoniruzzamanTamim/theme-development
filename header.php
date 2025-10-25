<?php
// Header Section 
 ?>




<!DOCTYPE html>
<html lang="<?php language_attributes() ;?>" class='no-js'>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- // HEADER  Section START  -->
<header class="header-section <?php echo get_theme_mod('menu_possition_change'); ?>">
    <div class="container bg-black w-100% ml-5 mr-5">
    <div class="row center-content">
            <!-- LOGO SECTION -->
        <div class="col-xl-3 header-colum-one col-md-2 col-sm-2">
                <div class="header-logo">
                    <img class="lheader-ogo-image" src="<?php echo get_theme_mod('header_logo') ?>" >
                </div>
        </div>
                    <!-- MENU SECTION -->
        <div class="col-xl-7 header-colum-two col-md-8 col-sm-8">
                <div class="header-menu">
                    <?php wp_nav_menu(array('theme_location' => 'main_menu', 'menu_class' => 'nav-menu')) ?>
                </div>
        </div>
                    <!-- EXTRA SECTION -->
        <div class="col-xl-2 header-colum-three col-sm-2 col-md-2">
            <div class="header-extra">
               <?php
                    $cv_pdf_url = get_theme_mod( 'cv_pdf_file' ); 
                ?>
                <a href="<?php echo esc_url( $cv_pdf_url ); ?>" class="download-cv-button" download>
                    <?php _e( 'Download CV', 'mytheme' ); ?>
                </a>


            </div>
        </div>
    </div>
    </div>
</header>
<!-- // HEADER  Section END   -->