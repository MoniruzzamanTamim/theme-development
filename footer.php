<?php
/*
* This template for displaying the Footer
*/
?>

<?php
$year = date('Y');
$designer_name = get_theme_mod('footer_content', 'Developer TAMIM');
$designer_link = get_theme_mod('footer_link', '#');
?>


<footer>
    <!-- Main Footer  Fotter Part Start -->
<section class="main-footer-section">
      <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="main-footer">
                    <?php dynamic_sidebar('footer-sidebar-1'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Footer   Part END -->
<!-- bottom Fotter Part Start -->
<section class="bottom-footer bg-black py-3 text-center" >
        <?php if (get_theme_mod('show_footer_section', true)) : ?>
    <div class="container-fluid">
    <div class="row">
            <div class="col-xl-12">
                <?php
                $year = date('Y');
                $designer_name = get_theme_mod('footer_content');
                $designer_link = get_theme_mod('footer_link');
                ?>
                <p class="mb-0 text-white">
                    &copy; <?php echo esc_html($year); ?> THEME. Designed by 
                    <?php if ($designer_link): ?>
                        <a href="<?php echo esc_url($designer_link); ?>" target="_blank" rel="noopener noreferrer" class="text-white">
                            <?php echo esc_html($designer_name); ?>
                        </a>
                    <?php else: ?>
                        <?php echo esc_html($designer_name); ?>
                    <?php endif; ?>
                </p>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>
<!-- bottom Footer Part End... -->
</footer>

<!-- // Footer Section END  -->


    <?php wp_footer();?>
</body>
</html>
