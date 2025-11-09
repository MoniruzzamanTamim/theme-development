<?php
/*
* Template Name: Page width sidebar
*/ 
get_header(); ?>


<section class="body_section">
    <div class="container-fluid"><!-- Dynamically add container class here -->
        <div class="row">
            <div class="col-xl-9">
                <!-- Page Content Slice -->
                <?php get_template_part('templete/page_setting'); ?>
            </div>
            <div class="col-xl-3">
                <!-- Page Content Slice -->
                <h2>Page SideBar</h2>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>