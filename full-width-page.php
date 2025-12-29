<?php
/*
@Package TAMIM Theme
====================================
        Full Width Page Template
====================================
*/
?>
<!-- ================Header Section Start===================  -->
<?php get_header(); ?>
<!-- ================Header Section Start====================  -->

<section class="body_section full-width-page page-design ">
    <div class="container-fluid"><!-- Dynamically add container class here -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Page Content Slice -->
                <?php get_template_part('templete/page_setting'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>