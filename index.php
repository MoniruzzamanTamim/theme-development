<?php
/*
@Package TAMIM Theme
====================================
        BLOG Page Template
====================================
*/
?>
<!-- ================Header Section Start===================  -->
<?php get_header(); ?>
<!-- ================Header Section Start====================  -->
<!-- // ================= Add Breadcrumb related Code Start here  ================= -->
<?php
    $show_breadcrumb = get_post_meta(get_the_ID(), '_tamim_show_breadcrumb', true); 
    if ($show_breadcrumb) : ?>
        <nav class="breadcrumb">
            <a href="<?php echo home_url(); ?>">Home</a> › 
            <span><?php the_title(); ?></span>
        </nav>
<?php endif; ?>
<!-- // ================= Add Breadcrumb related Code End here  ================= -->

<!-- ================Body Section Start===================  -->
<section class="body_section blog-page page-design">
    <div class="container">
        <div class="row">

            <!-- Main Content -->
            <div class="col-12 col-lg-8">
                <div class="main_blog-post">
                    <div class="col-row">
                        <?php get_template_part('templete/blog_post'); ?>
                    </div>
                </div>
            </div>

            <!-- Sidebar (Only PC & Laptop) -->
            <div class="col-lg-4 d-none d-lg-block">
                <div class="Sidebars-part">
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