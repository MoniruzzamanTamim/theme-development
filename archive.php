<!-- ================Header Section Start===================  -->
<?php 
/*
* The template for displaying Archive Pages
*/ 
get_header(); ?>
<!-- ================Header Section Start====================  -->


<!-- ================Body Section Start===================  -->
<section class="body_section archive-section bg-black page-design  ">

    <div class="container">
        <div class="row">
            <div class="col-xl-8"> 
                <div class="archive-title">
                <?php
                    the_archive_title('<h1 class="title">','</h1>');
                    the_author_description('<div class="description">', '</div>');
                ?>
                </div>
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