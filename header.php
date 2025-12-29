<?php
/**
 * Header Template
 * @Package Tamim-Personal
 */

$options = get_option('tamims_options', []);

/* LOGO */
$desktop_logo = $options['header_logo'] ?? '';
$mobile_logo  = !empty($options['header_mobile_logo']) ? $options['header_mobile_logo'] : $desktop_logo;

/* MENU */
$selected_menu = $options['header_menu'] ?? '';

/* BUTTON */
$header_btn_enable = $options['header_btn_enable'] ?? '1';
$cv_file_url       = $options['cv_file'] ?? '';
$button_text       = $options['header_button_text'] ?? 'Download CV';

$show_button = ($header_btn_enable == '1' && !empty($cv_file_url));
$download_cv_url = '';

if ($show_button) {
    $download_cv_url = add_query_arg(
        [
            'tamim_download_cv' => '1',
            'file'  => esc_url_raw($cv_file_url),
            'nonce' => wp_create_nonce('tamim_download_cv'),
        ],
        home_url('/')
    );
}

/* COLORS */
$header_bg_color  = $options['header_bg_color'] ?? '#ffffff';
$menu_text_color  = $options['menu_text_color'] ?? '#333333';
$menu_hover_color = $options['menu_hover_color'] ?? '#0073aa';
$button_bg        = $options['button_bg_color'] ?? '#0073aa';
$button_text      = $options['button_text_color'] ?? '#ffffff';
$mobile_menu_bg   = $options['mobile_menu_bg'] ?? '#ff014f';
$mobile_menu_text = $options['mobile_menu_text'] ?? '#ffffff';
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="header-section px-3">
    <div class="container">
        <div class="row align-items-center">

            <!-- LOGO -->
            <div class="col-6 col-md-3">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if ($desktop_logo): ?>
                        <img src="<?php echo esc_url($desktop_logo); ?>" class="d-none d-md-block">
                        <img src="<?php echo esc_url($mobile_logo); ?>" class="d-block d-md-none">
                    <?php else: ?>
                        <span><?php bloginfo('name'); ?></span>
                    <?php endif; ?>
                </a>
            </div>

            <!-- DESKTOP MENU -->
            <div class="col-md-7 d-none d-md-block">
                <?php
                wp_nav_menu([
                    'menu' => $selected_menu ?: '',
                    'theme_location' => !$selected_menu ? 'main_menu' : '',
                    'menu_class' => 'nav-menu d-flex justify-content-center list-unstyled m-0'
                ]);
                ?>
            </div>

            <!-- BUTTON -->
            <?php if ($show_button): ?>
            <div class="col-md-2 d-none d-md-block text-end">
                <a href="<?php echo esc_url($download_cv_url); ?>" class="btn download-cv">
                    <?php echo esc_html($button_text); ?>
                </a>
            </div>
            <?php endif; ?>

            <!-- 🔥 MOBILE MENU ICON (UNCHANGED 100%) -->
            <div class="d-block d-md-none col-sm-4 col-4 text-end">
                <div class="header-menu-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/menu-icon.png" 
                         alt="Menu Icon"
                         style="cursor: pointer;">
                </div>
            </div>

        </div>
    </div>
</header>

<?php
echo '<pre>';
print_r(get_option('tamims_options')['header_logo']);
echo '</pre>';

echo $desktop_logo;
?>


