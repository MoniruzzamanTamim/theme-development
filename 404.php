<?php
/*
@Package TAMIM Theme
====================================
        404 Page Template
====================================
*/
?>


<!-- ================Header Section Start===================  -->
<?php error_reporting(E_ALL);
ini_set('display_errors', 1);
get_header(); ?>
<!-- ================Header Section Start====================  -->


<!-- ================Body Section Start===================  -->
<section class="body_section fourzorofour bg-black page-design ">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 "> 
                <!-- Slicing Blog Related Code  -->
                <div class="error-404">
                <div class="content">
                    <h1>404</h1>
                    <h2>Oops! Page Not Found</h2>
                    <p>The page you’re looking for doesn’t exist or may have been moved.</p>
                    <a class="button-404" href="<?php echo esc_url(home_url('/')); ?>">Go Back Home</a>
                    <div class="search-box-404"><?php get_search_form(); ?></div>
                </div>
                </div>

            </div>
        </div>

        </div>
    </div>
</section>
<!-- ================Body Section End====================  -->


<!-- ================Footer Section Start===================  -->
<?php get_footer(); ?> 
<!-- ================Footer Section Start====================  -->