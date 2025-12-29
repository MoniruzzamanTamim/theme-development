
<?php
/*
@Package TAMIM Theme
====================================
        SEARCH Page Template
====================================
*/
?>
<!-- ================Header Section Start===================  -->
<?php get_header(); ?>
<!-- ================Header Section Start====================  -->
<!-- ================Body Section Start===================  -->
<section class="body_section search-page  page-design ">

        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8"> 

                <div class="search-title">
                    <h2 class='title'> <?php printf(__('Search Result For: %s', 'tamim-Personal'), get_search_query());?></h2>
                </div>

                    <!-- Slicing Blog Related Code  -->
                    <?php get_template_part('templete/blog_post'); ?>
                </div>
                <!-- Sidebar (Only PC & Laptop) -->
            <div class="col-lg-4 d-none d-lg-block">
                    <div class="Sidebars-part ">
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