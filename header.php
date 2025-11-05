<?php
// Header Section  Start 
?>


<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
<!-- HEADER Section START -->
<header class="header-section <?php echo esc_attr( get_theme_mod('menu_position_change', 'center') ); ?>">
    <div class="container ">
        <div class="row align-items-center">
            
            <!-- LOGO SECTION -->
            <div class="col-xl-3 col-md-2 col-sm-2 header_colum_one">
                <div class="header-logo">
                    <img class="header-logo-image" src="<?php echo esc_url( get_theme_mod('header_logo') ); ?>" alt="Logo">
                </div>
            </div>

            <!-- MENU SECTION -->
            <div class="col-xl-7 col-md-8 col-sm-8 header_colum_two">
                <nav class="header-menu">
                    <?php 
                    wp_nav_menu(array(
                        'theme_location' => 'main_menu',
                        'menu_class'     => 'nav-menu list-unstyled d-flex justify-content-center m-0'
                    )); 
                    ?>
                </nav>
            </div>

            <!-- EXTRA SECTION Start -->
            <div class="col-xl-2 col-md-2 col-sm-2 text-end header_colum_three">
                <div class="header-extra">
                    <?php $cv_pdf_url = get_theme_mod('cv_pdf_file'); ?>
                <a href="<?php echo esc_url($cv_pdf_url); ?>" class="download-cv-button btn btn-primary" download>
                    <?php _e('Download CV', 'tamim-personal'); ?>
                </a>
                </div>
            </div>
           <!-- EXTRA SECTION Start -->  

        </div>
    </div>
</header>
<?php wp_footer(); ?>
</body>
</html>
