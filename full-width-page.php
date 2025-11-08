<?php
/*
* Template Name: Full Width Page
*/ 
get_header(); ?>

<section class="body_section">
    <div class="container-fluid"><!-- Dynamically add container class here -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Page Content Slice -->
                <?php get_template_part('templete/page_setting'); ?>
            </div>
        </div>
    </div>
</section>