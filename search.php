<?php
/*
* The template for displaying Search Resealt
*/ 
get_header(); ?>



<!-- ================Body Section Start===================  -->
<section class="body_section search-page bg-black page-design ">

        <div class="container">
            <div class="row">
                <div class="col-xl-8"> 

                <div class="search-title">
                    <h2 class='title'> <?php printf(__('Search Result For: %s', 'tamim-Personal'), get_search_query());?></h2>
                </div>

                    <!-- Slicing Blog Related Code  -->
                    <?php get_template_part('templete/blog_post'); ?>
                </div>
                <div class="col-xl-4">
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