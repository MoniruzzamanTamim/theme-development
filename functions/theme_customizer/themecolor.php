<?php
/* Theme Color Customizer Options
 */
// Theme Color Customizer option Enable.............................


function tamim_theme_color($wp_customize) {

    // === Panel ===
    $wp_customize->add_panel('tamim-color-panel', array(
        'title'       => __('Theme Colors', 'tamim-personal'),
        'description' => __('Customize theme color options', 'tamim-personal'),
        'priority'    => 100,
        'capability'  => 'edit_theme_options',
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
        'body'          => __('Body Text Color', 'tamim-personal'),
        'site_title'    => __('Site Title Color', 'tamim-personal'), // renamed
        'link'          => __('Link Color', 'tamim-personal'),
        'button_bg'     => __('Button BG Color', 'tamim-personal'), // underscore
        'button_text'   => __('Button TEXT Color', 'tamim-personal'), // underscore
        'border'        => __('Border Color', 'tamim-personal'),
        'heading_title' => __('Heading Title Color', 'tamim-personal'), // renamed
        'h2'            => __('H2 Color', 'tamim-personal'),
        'h3'            => __('H3 Color', 'tamim-personal'),
        'h4'            => __('H4 Color', 'tamim-personal'),
        'menu'          => __('Menu Color', 'tamim-personal'),
        'breadcrumb_bg'    => __('Breadcrumb & TITLE BG Color', 'tamim-personal'),
        'breadcrumb_text'  => __('Breadcrumb Text Color', 'tamim-personal'),
        'breadcrumb_link'  => __('Breadcrumb Link Color', 'tamim-personal'),
    );

    foreach ($general_colors as $id => $label) {
        $setting_id = 'tamim_color_' . $id;

        $wp_customize->add_setting($setting_id, array(
            'default'           => '#000000',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
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
        'title'    => __('HEADER & FOOTER Colors', 'tamim-personal'),
        'priority' => 20,
        'panel'    => 'tamim-color-panel',
    ));

    $header_colors = array(
        // General Header
        'header_bg'             => __('Header Background Color', 'tamim-personal'),
        'header_menu_text'      => __('Menu Text Color', 'tamim-personal'),
        'header_text_bg_hover'  => __('Menu Text Hover Background', 'tamim-personal'),
        'header_text_hover'     => __('Menu Hover Text Color', 'tamim-personal'),

        // Header Button
        'header_btn_text'       => __('Header Button Text Color', 'tamim-personal'),
        'header_btn_text_hover' => __('Header Button Hover Text Color', 'tamim-personal'),
        'header_btn_bg'         => __('Header Button Background Color', 'tamim-personal'),
        'header_btn_bg_hover'   => __('Header Button Hover Background', 'tamim-personal'),
        'header_btn_border'     => __('Header Button Border Color', 'tamim-personal'),
        'header_btn_border_hover' => __('Header Button Hover Border', 'tamim-personal'),

        // Footer Colors
        'footer_bg'             => __('Footer BG Color', 'tamim-personal'), // underscore
        'footer_text'           => __('Footer Text Color', 'tamim-personal'), // underscore
    );

    foreach ($header_colors as $id => $label) {
        $setting_id = 'tamim_color_' . $id;

        $wp_customize->add_setting($setting_id, array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting_id, array(
            'label'    => $label,
            'section'  => 'tamim_color_section_header',
            'settings' => $setting_id,
        )));
    }

    /**
     * =========================
     * 3️⃣ Custom Login Page Color
     * =========================
     */
    $wp_customize->add_section('tamim_color_section_custom_login', array(
        'title'    => __('Custom Login Page', 'tamim-personal'),
        'priority' => 30, // ✅ Changed from 20 to 30
        'panel'    => 'tamim-color-panel',
    ));

    $custom_login_colors = array(
        'login_bg'                    => __('Page Background Color', 'tamim-personal'),
        'login_btn_bg'                => __('Login Button Color', 'tamim-personal'), // renamed
        'login_btn_bg_hover'          => __('Login Button Hover Color', 'tamim-personal'), // renamed
        'login_btn_text'              => __('Login Button Text Color', 'tamim-personal'), // renamed
        'login_btn_text_hover'        => __('Login Button Text Hover', 'tamim-personal'), // renamed
        'login_label'                 => __('Label Text Color', 'tamim-personal'),
        'login_border'                => __('Input & Form Border Color', 'tamim-personal'),
        'login_error_border'          => __('Error/Message Border Color', 'tamim-personal'),
        'login_backtoblog_bg'         => __('Back to Blog Button BG', 'tamim-personal'),
        'login_backtoblog_bg_hover'   => __('Back to Blog Button Hover BG', 'tamim-personal'),
        'login_backtoblog_text'       => __('Back to Blog Button Text', 'tamim-personal'),
        'login_backtoblog_text_hover' => __('Back to Blog Button Hover Text', 'tamim-personal'),
    );

    foreach ($custom_login_colors as $id => $label) {
        $setting_id = 'tamim_color_' . $id;

        $wp_customize->add_setting($setting_id, array(
            'default'           => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting_id, array(
            'label'    => $label,
            'section'  => 'tamim_color_section_custom_login',
            'settings' => $setting_id,
        )));
    }

    /**
     * =========================
     * 4️⃣ Home Page Colors Section
     * =========================
     */
    $wp_customize->add_section('tamim_color_section_homepage', array(
        'title'    => __('Home Page Colors', 'tamim-personal'),
        'priority' => 40,
        'panel'    => 'tamim-color-panel',
    ));

    // Home Page All Buttons Colors
    $homepage_colors = array(
        'home_all_btn_bg'           => array(__('All Buttons Background', 'tamim-personal'), '#FF014F'),
        'home_all_btn_text'         => array(__('All Buttons Text Color', 'tamim-personal'), '#FFFFFF'),
        'home_all_btn_border'       => array(__('All Buttons Border', 'tamim-personal'), '#FF014F'),
        'home_all_btn_bg_hover'     => array(__('All Buttons BG Hover', 'tamim-personal'), '#D60043'),
        'home_all_btn_text_hover'   => array(__('All Buttons Text Hover', 'tamim-personal'), '#FFFFFF'),
        'home_all_btn_border_hover' => array(__('All Buttons Border Hover', 'tamim-personal'), '#D60043'),
        
        // Banner Colors
        'home_banner1_bg'           => array(__('Banner 1 Background', 'tamim-personal'), '#000000'),
        'home_banner1_title'          => array(__('Banner 1 Title Color', 'tamim-personal'), '#FFFFFF'),
        'home_banner1_sub_title'         => array(__('Banner 1 Sub Title Color', 'tamim-personal'), '#000000'),
        'home_banner1_text-animation'         => array(__('Banner 1 Text Animation Color', 'tamim-personal'), '#ffffffff'),
        'home_banner1_icon_bg'       => array(__('Banner 1 Icon Background', 'tamim-personal'), '#FF014F'),
        'home_banner1_icon_text' => array(__('Banner 1 Icon Text', 'tamim-personal'), '#D60043'),
        'home_banner1_icon_border'       => array(__('Banner 1 Icon Border', 'tamim-personal'), '#FF014F'),
        'home_banner1_icon_bg_hover' => array(__('Banner 1 Icon BG Hover', 'tamim-personal'), '#D60043'),
        'home_banner1_icon_text_hover' => array(__('Banner 1 Icon Text Hover', 'tamim-personal'), '#D60043'),
        'home_banner1_icon_border_hover' => array(__('Banner 1 Icon Border Hover', 'tamim-personal'), '#D60043'),

        'home_banner2_bg'           => array(__('Banner 2 Background', 'tamim-personal'), '#F2F0EF'),
        'home_banner2_title'          => array(__('Banner 2 Title Color', 'tamim-personal'), '#FFFFFF'),
        'home_banner2_sub_title'         => array(__('Banner 2 Sub Title Color', 'tamim-personal'), '#000000'),
        'home_banner2_text-animation'         => array(__('Banner 2 Text Animation Color', 'tamim-personal'), '#ffffffff'),
        'home_banner2_icon_bg'       => array(__('Banner 2 Icon Background', 'tamim-personal'), '#FF014F'),
        'home_banner2_icon_text' => array(__('Banner 2 Icon Text', 'tamim-personal'), '#D60043'),
        'home_banner2_icon_border'       => array(__('Banner 2 Icon Border', 'tamim-personal'), '#FF014F'),
        'home_banner2_icon_bg_hover' => array(__('Banner 2 Icon BG Hover', 'tamim-personal'), '#D60043'),
        'home_banner2_icon_text_hover' => array(__('Banner 2 Icon Text Hover', 'tamim-personal'), '#D60043'),
        'home_banner2_icon_border_hover' => array(__('Banner 2 Icon Border Hover', 'tamim-personal'), '#D60043'),
        
        // About Section Colors
        'home_about_bg'             => array(__('About Section Background', 'tamim-personal'), '#FFFFFF'),
        'home_about_title'          => array(__('About Title Color', 'tamim-personal'), '#000000'),
        'home_about_title_border'   => array(__('About Title Border', 'tamim-personal'), '#FF014F'),
        'home_about_text'           => array(__('About Normal Text', 'tamim-personal'), '#333333'),
        
        // Grow Section Colors
        'home_grow_bg'              => array(__('Grow Section Background', 'tamim-personal'), '#1A1F2B'),
        'home_grow_title'           => array(__('Grow Title Color', 'tamim-personal'), '#FFFFFF'),
        'home_grow_text'            => array(__('Grow Normal Text', 'tamim-personal'), '#E0E0E0'),
        'home_grow_service_count'    => array(__('Grow Service count', 'tamim-personal'), '#FF014F'),
        'home_grow_service_text'    => array(__('Grow Service Text', 'tamim-personal'), '#FFFFFF'),
        
        // Work Process Colors
        'home_work_bg'              => array(__('Work Process BG', 'tamim-personal'), '#FFFFFF'),
        'home_work_title'           => array(__('Work Process Title', 'tamim-personal'), '#000000'),
        'home_work_subtitle'        => array(__('Work Process Sub-title', 'tamim-personal'), '#FF014F'),
        'home_work_step_bg'         => array(__('Work Process Step BG', 'tamim-personal'), '#FFFFFF'),
        'home_work_step_title'      => array(__('Work Process Step Title', 'tamim-personal'), '#000000'),
        'home_work_step_desc'       => array(__('Work Process Step Desc', 'tamim-personal'), '#666666'),
        'home_work_count_bg'        => array(__('Work Process Step Count BG', 'tamim-personal'), '#FF014F'),
        'home_work_count_color'     => array(__('Work Process Step Count Color', 'tamim-personal'), '#FFFFFF'),
        
        // Build Section Colors
        'home_build_bg'             => array(__('Build BG', 'tamim-personal'), '#FFFFFF'),
        'home_build_after_bg'             => array(__('Build BG', 'tamim-personal'), '#FF014F'),
        'home_build_subtitle'       => array(__('Build Sub-title', 'tamim-personal'), '#FFFFFF'),
        'home_build_title'          => array(__('Build Title Color', 'tamim-personal'), '#FFFFFF'),
        'home_build_btn_bg'           => array(__('Build Buttons Background', 'tamim-personal'), '#FF014F'),
        'home_build_btn_text'         => array(__('Build Buttons Text Color', 'tamim-personal'), '#FFFFFF'),
        'home_build_btn_border'       => array(__('Build Buttons Border', 'tamim-personal'), '#FF014F'),
        'home_build_btn_bg_hover'     => array(__('Build Buttons BG Hover', 'tamim-personal'), '#D60043'),
        'home_build_btn_text_hover'   => array(__('Build Buttons Text Hover', 'tamim-personal'), '#FFFFFF'),
        'home_build_btn_border_hover' => array(__('Build Buttons Border Hover', 'tamim-personal'), '#D60043'),

        // Service Section Colors
        'home_service_bg'             => array(__('Service BG', 'tamim-personal'), '#000000ff'),
        'home_service_step_bg'             => array(__('Service Step BG', 'tamim-personal'), '#eb0b4eff'),
        'home_service_step_border'             => array(__('Service Step Border ', 'tamim-personal'), '#FF014F'),
        'home_service_catagory_time'             => array(__('Service Catagory & Time ', 'tamim-personal'), '#FF014F'),
        'home_service_subtitle'       => array(__('Service Sub-title', 'tamim-personal'), '#FFFFFF'),
        'home_service_title'          => array(__('Servicele Color', 'tamim-personal'), '#FFFFFF'),
        'home_service_btn_bg'           => array(__('Service Buttons Background', 'tamim-personal'), '#FF014F'),
        'home_service_btn_text'         => array(__('Service Buttons Text Color', 'tamim-personal'), '#FFFFFF'),
        'home_service_btn_border'       => array(__('Service Buttons Border', 'tamim-personal'), '#FF014F'),
        'home_service_btn_bg_hover'     => array(__('Service Buttons BG Hover', 'tamim-personal'), '#D60043'),
        'home_service_btn_text_hover'   => array(__('Service Buttons Text Hover', 'tamim-personal'), '#FFFFFF'),
        'home_service_btn_border_hover' => array(__('Service Buttons Border Hover', 'tamim-personal'), '#D60043'),
    );

    foreach ($homepage_colors as $id => $data) {
        $label = $data[0];
        $default = $data[1];
        $setting_id = 'tamim_color_' . $id;

        $wp_customize->add_setting($setting_id, array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting_id, array(
            'label'    => $label,
            'section'  => 'tamim_color_section_homepage',
            'settings' => $setting_id,
        )));
    }
    /**
     * =========================
     * 5 Blog Page Colors Section
     * =========================
     */
    $wp_customize->add_section('tamim_color_section_blogpage', array(
        'title'    => __('Blog Page Colors', 'tamim-personal'),
        'priority' => 40,
        'panel'    => 'tamim-color-panel',
    ));

    // BLOG Page All Buttons Colors
    $blogpage_colors = array(
        'blog_all_btn_bg'           => array(__('All Buttons Background', 'tamim-personal'), '#FF014F'),
        'blog_all_btn_text'         => array(__('All Buttons Text Color', 'tamim-personal'), '#FFFFFF'),
        'blog_all_btn_border'       => array(__('All Buttons Border', 'tamim-personal'), '#FF014F'),
        'blog_all_btn_bg_hover'     => array(__('All Buttons BG Hover', 'tamim-personal'), '#D60043'),
        'blog_all_btn_text_hover'   => array(__('All Buttons Text Hover', 'tamim-personal'), '#FFFFFF'),
        'blog_all_btn_border_hover' => array(__('All Buttons Border Hover', 'tamim-personal'), '#D60043'),
        
        // You can add more blog page specific colors here
         'blog_bg' => array(__('Blog Background', 'tamim-personal'), '#000000ff'),
         'blog_step_bg' => array(__('Blog Step BG', 'tamim-personal'), '#eb0b4eff'),
        'blog_step_border' => array(__('Blog Step Border ', 'tamim-personal'), '#FF014F'),
        'blog_catagory_time' => array(__('Blog Catagory & Time ', 'tamim-personal'), '#ffffffff'),
        'blog_subtitle'       => array(__('Blog Sub-title', 'tamim-personal'), '#FFFFFF'),
        'blog_title'          => array(__('Blogle Color', 'tamim-personal'), '#FFFFFF'),
        'blog-des'           => array(__('Blog Normal Text', 'tamim-personal'), '#E0E0E0'),      
    );

    foreach ($blogpage_colors as $id => $data) {
        $label = $data[0];
        $default = $data[1];
        $setting_id = 'tamim_color_' . $id;

        $wp_customize->add_setting($setting_id, array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_hex_color',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
        ));

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting_id, array(
            'label'    => $label,
            'section'  => 'tamim_color_section_blogpage',
            'settings' => $setting_id,
        )));
    }
}
add_action('customize_register', 'tamim_theme_color');

// =================================================================================================

/**
 * Output the selected colors to the site 
 */
function tamim_theme_cus() {
    ?>
    <style>
    :root {
        /* === General === */
        --body-color: <?php echo esc_html(get_theme_mod('tamim_color_body', '#000000')); ?>;
        --site-title: <?php echo esc_html(get_theme_mod('tamim_color_site_title', '#000000')); ?>;
        --link-color: <?php echo esc_html(get_theme_mod('tamim_color_link', '#0a0a0a')); ?>;
        --button-bg-color: <?php echo esc_html(get_theme_mod('tamim_color_button_bg', '#FF014F')); ?>;
        --button-text-color: <?php echo esc_html(get_theme_mod('tamim_color_button_text', '#ffffff')); ?>;
        --border-color: <?php echo esc_html(get_theme_mod('tamim_color_border', '#cccccc')); ?>;
        --heading-title-color: <?php echo esc_html(get_theme_mod('tamim_color_heading_title', '#f3efef')); ?>;
        --h2-color: <?php echo esc_html(get_theme_mod('tamim_color_h2', '#222222')); ?>;
        --h3-color: <?php echo esc_html(get_theme_mod('tamim_color_h3', '#333333')); ?>;
        --h4-color: <?php echo esc_html(get_theme_mod('tamim_color_h4', '#444444')); ?>;
        --menu-color: <?php echo esc_html(get_theme_mod('tamim_color_menu', '#ffffff')); ?>;
        --breadcrumb-bg: <?php echo esc_html(get_theme_mod('tamim_color_breadcrumb_bg', '#000000ff')); ?>;
        --breadcrumb-text: <?php echo esc_html(get_theme_mod('tamim_color_breadcrumb_text', '#FF014F')); ?>;
        --breadcrumb-link: <?php echo esc_html(get_theme_mod('tamim_color_breadcrumb_link', '#ffffffff')); ?>;

        /* === Header === */
        --header-bg-color: <?php echo esc_html(get_theme_mod('tamim_color_header_bg', '#000000')); ?>;
        --header-text-color: <?php echo esc_html(get_theme_mod('tamim_color_header_menu_text', '#ffffff')); ?>;
        --header-text-bg-hover: <?php echo esc_html(get_theme_mod('tamim_color_header_text_bg_hover', '#FF014F')); ?>;
        --header-text-hover: <?php echo esc_html(get_theme_mod('tamim_color_header_text_hover', '#ffffff')); ?>;

        /* Header Buttons */
        --header-btn-text: <?php echo esc_html(get_theme_mod('tamim_color_header_btn_text', '#ffffff')); ?>;
        --header-btn-text-hover: <?php echo esc_html(get_theme_mod('tamim_color_header_btn_text_hover', '#ff014f')); ?>;
        --header-btn-bg: <?php echo esc_html(get_theme_mod('tamim_color_header_btn_bg', '#000000')); ?>;
        --header-btn-bg-hover: <?php echo esc_html(get_theme_mod('tamim_color_header_btn_bg_hover', '#FF014F')); ?>;
        --header-btn-border: <?php echo esc_html(get_theme_mod('tamim_color_header_btn_border', '#ffffff')); ?>;
        --header-btn-border-hover: <?php echo esc_html(get_theme_mod('tamim_color_header_btn_border_hover', '#FF014F')); ?>;

        /* === Footer === */
        --footer-bg: <?php echo esc_html(get_theme_mod('tamim_color_footer_bg', '#000000')); ?>;
        --footer-text: <?php echo esc_html(get_theme_mod('tamim_color_footer_text', '#ffffff')); ?>;

        /* === Home Page Colors === */
        --home-btn-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_all_btn_bg', '#FF014F')); ?>;
        --home-btn-text: <?php echo esc_html(get_theme_mod('tamim_color_home_all_btn_text', '#FFFFFF')); ?>;
        --home-btn-border: <?php echo esc_html(get_theme_mod('tamim_color_home_all_btn_border', '#FF014F')); ?>;
        --home-btn-bg-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_all_btn_bg_hover', '#D60043')); ?>;
        --home-btn-text-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_all_btn_text_hover', '#FFFFFF')); ?>;
        --home-btn-border-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_all_btn_border_hover', '#D60043')); ?>;
        
        --banner1-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_banner1_bg', '#000000')); ?>;
        --banner1-title: <?php echo esc_html(get_theme_mod('tamim_color_home_banner1_title', '#FFFFFF')); ?>;
        --banner1-sub-title: <?php echo esc_html(get_theme_mod('tamim_color_home_banner1_sub_title', '#ffffffff')); ?>;
        --banner-text-animation: <?php echo esc_html(get_theme_mod('tamim_color_home_banner_text-animation', '#ffffffff')); ?>;
        --banner1-icon-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_banner1_icon_bg', '#FF014F')); ?>;
        --banner1-icon-text: <?php echo esc_html(get_theme_mod('tamim_color_home_banner1_icon_text', '#FF014F')); ?>;
        --banner1-icon-border: <?php echo esc_html(get_theme_mod('tamim_color_home_banner1_icon_border', '#FF014F')); ?>;
        --banner1-icon-bg-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_banner1_icon_bg_hover', '#D60043')); ?>;
        --banner1-icon-text-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_banner1_icon_text_hover', '#D60043')); ?>;
        --banner1-icon-border-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_banner1_icon_border_hover', '#D60043')); ?>;
        --banner2-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_banner2_bg', '#F2F0EF')); ?>;
        --banner2-title: <?php echo esc_html(get_theme_mod('tamim_color_home_banner2_title', '#FFFFFF')); ?>;
        --banner2-sub-title: <?php echo esc_html(get_theme_mod('tamim_color_home_banner2_sub_title', '#ffffffff')); ?>;
        --banner2-text-animation: <?php echo esc_html(get_theme_mod('tamim_color_home_banner2_text-animation', '#ffffffff')); ?>;
        --banner2-icon-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_banner2_icon_bg', '#FF014F')); ?>;
        --banner2-icon-text: <?php echo esc_html(get_theme_mod('tamim_color_home_banner2_icon_text', '#ffffffff')); ?>;
        --banner2-icon-border: <?php echo esc_html(get_theme_mod('tamim_color_home_banner2_icon_border', '#FF014F')); ?>;
        --banner2-icon-bg-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_banner2_icon_bg_hover', '#D60043')); ?>;
        --banner2-icon-text-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_banner2_icon_text_hover', '#ffffffff')); ?>;
        --banner2-icon-border-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_banner2_icon_border_hover', '#D60043')); ?>;
        

        --about-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_about_bg', '#FFFFFF')); ?>;
        --about-title: <?php echo esc_html(get_theme_mod('tamim_color_home_about_title', '#000000')); ?>;
        --about-title-border: <?php echo esc_html(get_theme_mod('tamim_color_home_about_title_border', '#FF014F')); ?>;
        --about-text: <?php echo esc_html(get_theme_mod('tamim_color_home_about_text', '#333333')); ?>;
        
        --grow-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_grow_bg', '#1A1F2B')); ?>;
        --grow-title: <?php echo esc_html(get_theme_mod('tamim_color_home_grow_title', '#FFFFFF')); ?>;
        --grow-text: <?php echo esc_html(get_theme_mod('tamim_color_home_grow_text', '#E0E0E0')); ?>;
        --grow-service-count: <?php echo esc_html(get_theme_mod('tamim_color_home_grow_service_count', '#FF014F')); ?>;
        --grow-service-text: <?php echo esc_html(get_theme_mod('tamim_color_home_grow_service_text', '#FFFFFF')); ?>;
        
        --work-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_work_bg', '#FFFFFF')); ?>;
        --work-title: <?php echo esc_html(get_theme_mod('tamim_color_home_work_title', '#000000')); ?>;
        --work-subtitle: <?php echo esc_html(get_theme_mod('tamim_color_home_work_subtitle', '#FF014F')); ?>;
        --work-step-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_work_step_bg', '#FFFFFF')); ?>;
        --work-step-title: <?php echo esc_html(get_theme_mod('tamim_color_home_work_step_title', '#000000')); ?>;
        --work-step-desc: <?php echo esc_html(get_theme_mod('tamim_color_home_work_step_desc', '#666666')); ?>;
        --work-count-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_work_count_bg', '#FF014F')); ?>;
        --work-count-color: <?php echo esc_html(get_theme_mod('tamim_color_home_work_count_color', '#FFFFFF')); ?>;
        
        --build-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_build_bg', '#FFFFFF')); ?>;
        --build-after-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_build_after_bg', '#FF014F')); ?>;
        --build-subtitle: <?php echo esc_html(get_theme_mod('tamim_color_home_build_subtitle', '#FFFFFF')); ?>;
        --build-title: <?php echo esc_html(get_theme_mod('tamim_color_home_build_title', '#FFFFFF')); ?>;
        --build-btn-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_build_btn_bg', '#FF014F')); ?>;
        --build-btn-text: <?php echo esc_html(get_theme_mod('tamim_color_home_build_btn_text', '#FFFFFF')); ?>;
        --build-btn-border: <?php echo esc_html(get_theme_mod('tamim_color_home_build_btn_border', '#FF014F')); ?>;
        --build-btn-bg-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_build_btn_bg_hover', '#D60043')); ?>;
        --build-btn-text-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_build_btn_text_hover', '#FFFFFF')); ?>;
        --build-btn-border-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_build_btn_border_hover', '#D60043')); ?>;

        --service-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_service_bg', '#FFFFFF')); ?>;
        --service-step-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_service_step_bg', '#FFFFFF')); ?>;
        --service-step-border: <?php echo esc_html(get_theme_mod('tamim_color_home_service_step_border', '#FFFFFF')); ?>;
        --service-catagory-time: <?php echo esc_html(get_theme_mod('tamim_color_home_service_catagory_time', '#FFFFFF')); ?>;
        --service-des: <?php echo esc_html(get_theme_mod('tamim_color_home_service_subtitle', '#FFFFFF')); ?>;
        --service-title: <?php echo esc_html(get_theme_mod('tamim_color_home_service_title', '#FFFFFF')); ?>;
        --service-btn-bg: <?php echo esc_html(get_theme_mod('tamim_color_home_service_btn_bg', '#FF014F')); ?>;
        --service-btn-text: <?php echo esc_html(get_theme_mod('tamim_color_home_service_btn_text', '#FFFFFF')); ?>;
        --service-btn-border: <?php echo esc_html(get_theme_mod('tamim_color_home_service_btn_border', '#FF014F')); ?>;
        --service-btn-bg-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_service_btn_bg_hover', '#D60043')); ?>;
        --service-btn-text-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_service_btn_text_hover', '#FFFFFF')); ?>;
        --service-btn-border-hover: <?php echo esc_html(get_theme_mod('tamim_color_home_service_btn_border_hover', '#D60043')); ?>;

        /* === Blog Page Colors === */
        --blog-btn-bg: <?php echo esc_html(get_theme_mod('tamim_color_blog_all_btn_bg', '#FF014F')); ?>;
        --blog-btn-text: <?php echo esc_html(get_theme_mod('tamim_color_blog_all_btn_text', '#FFFFFF')); ?>;
        --blog-btn-border: <?php echo esc_html(get_theme_mod('tamim_color_blog _all_btn_border', '#FF014F')); ?>;
        --blog-btn-bg-hover: <?php echo esc_html(get_theme_mod('tamim_color_blog_all_btn_bg_hover', '#D60043')); ?>;
        --blog-btn-text-hover: <?php echo esc_html(get_theme_mod('tamim_color_blog_all_btn_text_hover', '#FFFFFF')); ?>;
        --blog-btn-border-hover: <?php echo esc_html(get_theme_mod('tamim_color_blog_all_btn_border_hover', '#D60043')); ?>;    
        --blog-bg: <?php echo esc_html(get_theme_mod('tamim_color_blog_bg', '#000000ff')); ?>;
        --blog-step-bg: <?php echo esc_html(get_theme_mod('tamim_color_blog_step_bg', '#eb0b4eff')); ?>;
        --blog-step-border: <?php echo esc_html(get_theme_mod('tamim_color_blog_step_border', '#FF014F')); ?>;
        --blog-catagory-time: <?php echo esc_html(get_theme_mod('tamim_color_blog_catagory_time', '#ffffffff')); ?>;
        --blog-des: <?php echo esc_html(get_theme_mod('tamim_color_blog_des', '#E0E0E0')); ?>;
        --blog-subtitle: <?php echo esc_html(get_theme_mod('tamim_color_blog_subtitle', '#FFFFFF')); ?>;
        --blog-title: <?php echo esc_html(get_theme_mod('tamim_color_blog_title', '#FFFFFF')); ?>;      
    }
    </style>
    <?php
}
add_action('wp_head', 'tamim_theme_cus');

// ===============================================================================================================
// Output to Selected Color the Apply Front-End( Only For Login Page )

function tamim_theme_culor_login() {
    ?>
    <style>
    :root {
        --login-bg: <?php echo esc_html(get_theme_mod('tamim_color_login_bg', '#FF014F')); ?>;
        --login-btn-bg: <?php echo esc_html(get_theme_mod('tamim_color_login_btn_bg', '#ffffff')); ?>;
        --login-btn-bg-hover: <?php echo esc_html(get_theme_mod('tamim_color_login_btn_bg_hover', '#FF014F')); ?>;
        --login-btn-text: <?php echo esc_html(get_theme_mod('tamim_color_login_btn_text', '#FF014F')); ?>;
        --login-btn-text-hover: <?php echo esc_html(get_theme_mod('tamim_color_login_btn_text_hover', '#ffffff')); ?>;
        --login-label: <?php echo esc_html(get_theme_mod('tamim_color_login_label', '#ffffff')); ?>;
        --login-border: <?php echo esc_html(get_theme_mod('tamim_color_login_border', '#ffffff')); ?>;
        --login-error-border: <?php echo esc_html(get_theme_mod('tamim_color_login_error_border', '#000000')); ?>;
        --login-backtoblog-bg: <?php echo esc_html(get_theme_mod('tamim_color_login_backtoblog_bg', '#ffffff')); ?>;
        --login-backtoblog-bg-hover: <?php echo esc_html(get_theme_mod('tamim_color_login_backtoblog_bg_hover', '#FF014F')); ?>;
        --login-backtoblog-text: <?php echo esc_html(get_theme_mod('tamim_color_login_backtoblog_text', '#FF014F')); ?>;
        --login-backtoblog-text-hover: <?php echo esc_html(get_theme_mod('tamim_color_login_backtoblog_text_hover', '#ffffff')); ?>;
    }
    </style>
    <?php
}
add_action('login_head', 'tamim_theme_culor_login');