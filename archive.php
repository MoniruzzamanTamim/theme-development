<?php
/*
@Package TAMIM Theme
====================================
        ARCHIVE Page Template
====================================
*/
?>
<!-- ================Header Section Start===================  -->
<?php get_header(); ?>
<!-- ================Header Section Start====================  -->

<!-- ================Body Section Start===================  -->
<section class="body_section archive-section  page-design  ">

    <div class="container">
        <div class="row">
             <div class="col-12 col-lg-8">
                <div class="archive-title">
                <?php
                    the_archive_title('<h1 class="title">','</h1>');
                    the_author_description('<div class="description">', '</div>');
                ?>
                </div>
                    <!-- Slicing Blog Related Code  -->
                <?php get_template_part('templete/blog_post'); ?>
            </div>
             <!-- Sidebar (Only PC & Laptop) -->
            <div class="col-lg-4 d-none d-lg-block">
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