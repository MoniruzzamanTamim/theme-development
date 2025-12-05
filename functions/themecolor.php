
<?php
 /* Theme Color Customizer Options
 */

function tamim_theme_color($wp_customize) {

    // === Panel ===
    $wp_customize->add_panel('tamim-color-panel', array(
        'title'       => __('Theme Colors', 'tamim-personal'),
        'description' => __('Customize theme color options', 'tamim-personal'),
        'priority'    => 100,
    ));

     /* =========================
     * 1️⃣ General Color Section
     * =========================
     */
    $wp_customize->add_section('tamim_color_section', array(
        'title'    => __('General Colors', 'tamim-personal'),
        'priority' => 10,
        'panel'    => 'tamim-color-panel',
    ));

    $general_colors = array(
        'body'     => __('Body Text Color', 'tamim-personal'),
        'title'    => __('Site Title Color', 'tamim-personal'),
        'link'     => __('Link Color', 'tamim-personal'),
        'button-bg'   => __('Button BG Color', 'tamim-personal'),
        'button-text'   => __('Button TEXT Color', 'tamim-personal'),
        'border'   => __('Border Color', 'tamim-personal'),
        'title_color' => __('Title Color', 'tamim-personal'),
        'h2'       => __('H2 Color', 'tamim-personal'),
        'h3'       => __('H3 Color', 'tamim-personal'),
        'h4'       => __('H4 Color', 'tamim-personal'),
        'menu'     => __('Menu Color', 'tamim-personal'),
    );

    foreach ($general_colors as $id => $label) {
        $setting_id = 'tamim_color_' . $id;

        $wp_customize->add_setting($setting_id, array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting_id, array(
            'label'    => $label,
            'section'  => 'tamim_color_section',
            'settings' => $setting_id,
        )));
    }

    /**
     * =========================
     * 2️⃣ Header Color Section
     * =========================
     */
    $wp_customize->add_section('tamim_color_section_header', array(
        'title'    => __('HEADER & FOOTER  Colors', 'tamim-personal'),
        'priority' => 20,
        'panel'    => 'tamim-color-panel',
    ));

    $header_colors = array(
        // General Header
        'header_bg'             => __('Header Background Color', 'tamim-personal'),
        'header_menu_text'           => __(' Menu Text Color', 'tamim-personal'),
        'header_text_bg_hover' => __('Menu Text Hover Background Color', 'tamim-personal'),
        'header_text_hover'     => __(' Menu Hover Text Color', 'tamim-personal'),

        // Header Button
        'header_btn_text'           => __('Header Button Text Color', 'tamim-personal'),
        'header_btn_text_hover'     => __('Header Button Hover Text Color', 'tamim-personal'),
        'header_btn_bg'             => __('Header Button Background Color', 'tamim-personal'),
        'header_btn_bg_hover'       => __('Header Button Hover Background Color', 'tamim-personal'),
        'header_btn_border'         => __('Header Button Border Color', 'tamim-personal'),
        'header_btn_border_hover'   => __('Header Button Hover Border Color', 'tamim-personal'),

         // Footer Colors
        'footer-bg'              => __('Footer BG Color', 'tamim-personal'),
        'footer-text'            => __('Footer Text Color', 'tamim-personal'),

    );

    foreach ($header_colors as $id => $label) {
        $setting_id = 'tamim_color_' . $id;

        $wp_customize->add_setting($setting_id, array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting_id, array(
            'label'    => $label,
            'section'  => 'tamim_color_section_header',
            'settings' => $setting_id,
        )));
    }

     /**
     * =========================
     * 2️⃣ Custom Login Page Color
     * =========================
     */
    $wp_customize->add_section('tamim_color_section_custom_login', array(
        'title'    => __('Custom Login Page ', 'tamim-personal'),
        'priority' => 20,
        'panel'    => 'tamim-color-panel',
    ));

    $custom_login_colors = array(
        'login_bg'             => __('Page Background Color', 'tamim-personal'),
        'login_btn'           => __(' Login Button Color', 'tamim-personal'),
        'login_btn-text' => __('Login Button Text Color', 'tamim-personal'),
        'header_text_hover'     => __(' Menu Hover Text Color', 'tamim-personal'),

    );

    foreach ($custom_login_colors as $id => $label) {
        $setting_id = 'tamim_color_' . $id;

        $wp_customize->add_setting($setting_id, array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting_id, array(
            'label'    => $label,
            'section'  => 'tamim_color_section_custom_login',
            'settings' => $setting_id,
        )));
    }

}
add_action('customize_register', 'tamim_theme_color');



/**
 * Output the selected colors to the site
 */
function tamim_theme_cus() {

$colors = array(
        // General Colors
        'body'   => get_theme_mod('tamim_color_body', '#000000'),
        'title'  => get_theme_mod('tamim_color_title', '#000000'),
        'link'   => get_theme_mod('tamim_color_link', '#0a0a0aff'),
        'button-bg' => get_theme_mod('tamim_color_button', '#FF014F'),
        'button-text' => get_theme_mod('tamim_color_button', '#ffffffff'),
        'border' => get_theme_mod('tamim_color_border', '#cccccc'),
        'title_color' => get_theme_mod('tamim_color_title_color', '#f3efefff'),
        'h2'     => get_theme_mod('tamim_color_h2', '#222222'),
        'h3'     => get_theme_mod('tamim_color_h3', '#333333'),
        'h4'     => get_theme_mod('tamim_color_h4', '#444444'),
        'menu'   => get_theme_mod('tamim_color_menu', '#ffffff'),

        // Header Colors
        'header_bg'             => get_theme_mod('tamim_color_header_bg', '#000000ff'),
        'header_menu_text'           => get_theme_mod('tamim_color_header_text', '#ffffffff'),
       'header_text_bg_hover'       => get_theme_mod('tamim_color_header_text_bg_hover', '#FF014F'),
        'header_text_hover'     => get_theme_mod('tamim_color_header_text_hover', '#ffffff'),
        'header_btn_text'           => get_theme_mod('tamim_color_header_btn_text', '#ffffffff'),
        'header_btn_text_hover'     => get_theme_mod('tamim_color_header_btn_text_hover', '#ff014fff'),
        'header_btn_bg'             => get_theme_mod('tamim_color_header_btn_bg', '#000000ff'),
        'header_btn_bg_hover'       => get_theme_mod('tamim_color_header_btn_bg_hover', '#FF014F'),
        'header_btn_border'         => get_theme_mod('tamim_color_header_btn_border', '#ffffffff'),
        'header_btn_border_hover'   => get_theme_mod('tamim_color_header_btn_border_hover', '#FF014F'),

         // Footer Colors
        'footer-bg'             => get_theme_mod('tamim_color_footer_bg', '#000000ff'),
        'footer-text'           => get_theme_mod('tamim_color_footer-text', '#ffffffff'),
    );
    ?>
    <style>
        :root {
            /* === General === */
            --body-color: <?php echo esc_html($colors['body']); ?>;
            --title: <?php echo esc_html($colors['title']); ?>;
            --link-color: <?php echo esc_html($colors['link']); ?>;
            --button-bg-color: <?php echo esc_html($colors['button-bg']); ?>;
            --button-text: <?php echo esc_html($colors['button-text']); ?>;
            --border-color: <?php echo esc_html($colors['border']); ?>;
            --title-color: <?php echo esc_html($colors['title_color']); ?>;
            --h2-color: <?php echo esc_html($colors['h2']); ?>;
            --h3-color: <?php echo esc_html($colors['h3']); ?>;
            --h4-color: <?php echo esc_html($colors['h4']); ?>;
            --menu-color: <?php echo esc_html($colors['menu']); ?>;

            /* === Header === */
            --header-bg-color: <?php echo esc_html($colors['header_bg']); ?>;
            --header-text-color: <?php echo esc_html($colors['header_menu_text']); ?>;
            --header-text-bg-hover: <?php echo esc_html($colors['header_text_bg_hover']); ?>;
            --header-text-hover: <?php echo esc_html($colors['header_text_hover']); ?>;

            /* === Header Button === */
            --header-btn-text: <?php echo esc_html($colors['header_btn_text']); ?>;
            --header-btn-text-hover: <?php echo esc_html($colors['header_btn_text_hover']); ?>;
            --header-btn-bg: <?php echo esc_html($colors['header_btn_bg']); ?>;
            --header-btn-bg-hover: <?php echo esc_html($colors['header_btn_bg_hover']); ?>;
            --header-btn-border: <?php echo esc_html($colors['header_btn_border']); ?>;
            --header-btn-border-hover: <?php echo esc_html($colors['header_btn_border_hover']); ?>;

            /* === FOOTER  === */
            --footer-bg: <?php echo esc_html($colors['footer-bg']); ?>;
            --footer-text: <?php echo esc_html($colors['footer-text']); ?>;

            /* ============================== */
            /*    CUSTOM LOGIN PAGE COLORS    */
            /* ============================== */
            --login-bg: <?php echo esc_html($login_bg); ?>;
            --login-btn-bg: <?php echo esc_html($login_btn); ?>;
            --login-btn-text: <?php echo esc_html($login_btn_text); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'tamim_theme_cus');


