<?php ?>




<!DOCTYPE html>
<html lang="<?php language_attributes() ;?>" class='no-js'>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="header-section <?php echo get_theme_mod('menu_possition_change'); ?>">
    <div class="container-fluid bg-black w-100% ml-5 mr-5">
    <div class="row">
        <div class="col-xl-3 header-colum-one">
                <div class="header-logo">
                    <img class="lheader-ogo-image" src="<?php echo get_theme_mod('header_logo') ?>" >
                </div>
        </div>
        <div class="col-xl-6 header-colum-two">
                <div class="header-menu">
                    <?php wp_nav_menu(array('theme_location' => 'main_menu', 'menu_class' => 'nav-menu')) ?>
                </div>
        </div>
        <div class="col xl 3 header-colum-three">
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
</header>

<div class="body-area">
    <?php  the_content();?>
</div>



<!-- // Footer Section -->
<?php
$year = date('Y');
$designer_name = get_theme_mod('footer_content', 'Developer Jillur');
$designer_link = get_theme_mod('footer_link', '#');
?>

<?php if (get_theme_mod('show_footer_section', true)) : ?>
<footer>
    <div class="container-fluid bg-black py-3 text-center">
        <div class="row">
            <div class="col-xl-12">
                <?php
                $year = date('Y');
                $designer_name = get_theme_mod('footer_content');
                $designer_link = get_theme_mod('footer_link');
                ?>
                <p class="mb-0 text-white">
                    &copy; <?php echo esc_html($year); ?> THEME. Designed by 
                    <?php if ($designer_link): ?>
                        <a href="<?php echo esc_url($designer_link); ?>" target="_blank" rel="noopener noreferrer" class="text-white">
                            <?php echo esc_html($designer_name); ?>
                        </a>
                    <?php else: ?>
                        <?php echo esc_html($designer_name); ?>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </div>
</footer>
<?php endif; ?>





    <?php wp_footer();?></body>
</html>
