<?php
/*
@Package TAMIM Theme
====================================
        SINGLE Page Template
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
<section class="body_section py-5 single-page page-design  ">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8"> 
            <!-- Slicing Blog Related Code  -->
                <?php get_template_part('templete/blog-page_setting' ,get_post_format() ); ?> 
                <div class="commnet-area">
                <?php comments_template(); ?>
                </div>
            </div>
             <!-- Sidebar (Only PC & Laptop) -->
            <div class="col-lg-4 d-none d-lg-block">
                <div class="Sidebars-part">
                <!-- <h2>Show SideBar Area</h2> -->
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