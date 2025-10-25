<?php
$year = date('Y');
$designer_name = get_theme_mod('footer_content', 'Developer Jillur');
$designer_link = get_theme_mod('footer_link', '#');
?>

<?php if (get_theme_mod('show_footer_section', true)) : ?>
<footer>
    <div class="container-fluid bg-black py-3 text-center">
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
</footer>
<?php endif; ?>
<!-- // Footer Section END  -->





    <?php wp_footer();?>
</body>
</html>
