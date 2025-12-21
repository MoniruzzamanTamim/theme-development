<!-- ================Header Section Start===================  -->
<?php 
/*
* The template for displaying Blog  Full Content 
*/ 
get_header(); ?>
<!-- ================Header Section Start====================  -->


<!-- ================Body Section Start===================  -->
<section class="body_section py-5 singel-page page-design  ">

    <div class="container">
        <div class="row">
            <div class="col-xl-8 "> 
            <!-- Slicing Blog Related Code  -->
                <?php get_template_part('templete/blog-page_setting' ,get_post_format() ); ?> 
                <div class="commnet-area">
                <?php comments_template(); ?>
                </div>
            </div>

            <div class="col-xl-4">
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