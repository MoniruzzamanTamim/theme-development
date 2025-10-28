<!-- ================Header Section Start===================  -->
<?php error_reporting(E_ALL);
ini_set('display_errors', 1);
get_header(); ?>
<!-- ================Header Section Start====================  -->


<!-- ================Body Section Start===================  -->
<section class="body_section">

        <div class="container">
            <div class="row">
                <div class="col-xl-8"> 
                    <!-- Slicing Blog Related Code  -->
                    <?php get_template_part('templete/blog_post'); ?>
                </div>
                <div class="col-xl-4">
                    <div class="Sidebars-part">
                                            <h2>Show SideBar Area</h2>
                                            <?php get_sidebar(); ?>
                    </div>
                </div>

            </div>
        </div>
</section>
<!-- ================Body Section End====================  -->


<!-- ================Footer Section Start===================  -->
<?php get_footer(); ?> 
<!-- ================Footer Section Start====================  -->