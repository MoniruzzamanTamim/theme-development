<?php/*
* The template for displaying pages
*/ 
?>
<!-- ================Header Section Start===================  -->
<?php get_header(); ?>
<!-- ================Header Section End====================  -->

<?php
    // Get the layout option (either 'full-width' or 'boxed') from custom meta field
    $layout_option = get_post_meta(get_the_ID(), '_page_layout', true);
    // Set default layout if no option is selected
    if (empty($layout_option)) {
        $layout_option = 'boxed'; // Default to 'boxed' layout
    }
    // Assign container class based on layout choice
    if ($layout_option === 'full-width') {
        $container_class = 'container-fluid'; // Full-width layout
    } else {
        $container_class = 'container'; // Boxed layout
    }
?>

<!-- ================Body Section Start===================  -->
<section class="body_section">
    <div class="<?php echo $container_class; ?>"> <!-- Dynamically add container class here -->
        <div class="row">
            <div class="col-xl-12">
                <!-- Page Content Slice -->
                <?php get_template_part('templete/page_setting'); ?>
            </div>
        </div>
    </div>
</section>
<!-- ================Body Section End====================  -->

<!-- ================Footer Section Start===================  -->
<?php get_footer(); ?> 
<!-- ================Footer Section End====================  -->
