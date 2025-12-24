<?php

// Register Customizer for Home Page Settings
function tamim_homepage_customizer($wp_customize) {
    
    // Home Page Settings Panel
    $wp_customize->add_panel('homepage_settings', array(
        'title' => __('Home Page Settings', 'tamim-personal'),
        'priority' => 30,
    ));
    
    // ================== Banner Section ==================
    $wp_customize->add_section('banner_section', array(
        'title' => __('Banner Slider', 'tamim-personal'),
        'panel' => 'homepage_settings',
        'priority' => 10,
    ));
    
    // Slider Item 1 Title
    $wp_customize->add_setting('slider1_title', array(
        'default' => 'Hello,',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('slider1_title', array(
        'label' => __('Slider 1 Title', 'tamim-personal'),
        'section' => 'banner_section',
        'type' => 'text',
    ));
    
    // Slider 1 Name
    $wp_customize->add_setting('slider1_name', array(
        'default' => 'My name Md Moniruzzaman Tamim',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('slider1_name', array(
        'label' => __('Slider 1 Name', 'tamim-personal'),
        'section' => 'banner_section',
        'type' => 'text',
    ));
    
    // Typewriter Texts
    $wp_customize->add_setting('typewriter_texts', array(
        'default' => 'Web Developer,Web Designer,WordPress Expert',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('typewriter_texts', array(
        'label' => __('Typewriter Texts (comma separated)', 'tamim-personal'),
        'description' => __('Separate multiple roles with commas', 'tamim-personal'),
        'section' => 'banner_section',
        'type' => 'textarea',
    ));
    
    // Slider 1 Video
    $wp_customize->add_setting('slider1_video', array(
        'default' => get_template_directory_uri() . '/img/Programming.mp4',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slider1_video', array(
        'label' => __('Slider 1 Video', 'tamim-personal'),
        'description' => __('Upload MP4 video for first slider', 'tamim-personal'),
        'section' => 'banner_section',
        'mime_type' => 'video',
    )));
    
    // Slider 2 Background Image
    $wp_customize->add_setting('slider2_bg', array(
        'default' => get_template_directory_uri() . '/img/Shapes-Hero-Banner.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slider2_bg', array(
        'label' => __('Slider 2 Background', 'tamim-personal'),
        'section' => 'banner_section',
    )));
    
    // Slider 2 Title
    $wp_customize->add_setting('slider2_title', array(
        'default' => 'Hello,',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('slider2_title', array(
        'label' => __('Slider 2 Title', 'tamim-personal'),
        'section' => 'banner_section',
        'type' => 'text',
    ));
    
    // Slider 2 Description
    $wp_customize->add_setting('slider2_description', array(
        'default' => 'As a Creative Web Designer, I Transform Ideas Into Stunning Digital Experiences That Combine Design, Usability, and Technology',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('slider2_description', array(
        'label' => __('Slider 2 Description', 'tamim-personal'),
        'section' => 'banner_section',
        'type' => 'textarea',
    ));
    
    // Slider 2 Image
    $wp_customize->add_setting('slider2_image', array(
        'default' => get_template_directory_uri() . '/img/slide-two-image.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slider2_image', array(
        'label' => __('Slider 2 Main Image', 'tamim-personal'),
        'section' => 'banner_section',
    )));
    
    // Slider 2 Inner Image 1
    $wp_customize->add_setting('slider2_inner1', array(
        'default' => get_template_directory_uri() . '/img/slider-two-inner.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slider2_inner1', array(
        'label' => __('Slider 2 Inner Image 1', 'tamim-personal'),
        'section' => 'banner_section',
    )));
    
    // Slider 2 Inner Image 2
    $wp_customize->add_setting('slider2_inner2', array(
        'default' => get_template_directory_uri() . '/img/slider-two-inner-2.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'slider2_inner2', array(
        'label' => __('Slider 2 Inner Image 2', 'tamim-personal'),
        'section' => 'banner_section',
    )));
    
    // CV PDF File
    $wp_customize->add_setting('cv_pdf_file', array(
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'cv_pdf_file', array(
        'label' => __('Upload CV (PDF)', 'tamim-personal'),
        'section' => 'banner_section',
        'mime_type' => 'application/pdf',
    )));
    
    // ================== About Section ==================
    $wp_customize->add_section('about_section', array(
        'title' => __('About Section', 'tamim-personal'),
        'panel' => 'homepage_settings',
        'priority' => 20,
    ));
    
    // About Title
    $wp_customize->add_setting('about_title', array(
        'default' => 'What I do',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_title', array(
        'label' => __('About Section Title', 'tamim-personal'),
        'section' => 'about_section',
        'type' => 'text',
    ));
    
    // Web Design Section Title
    $wp_customize->add_setting('webdesign_title', array(
        'default' => 'Web Design & Development',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('webdesign_title', array(
        'label' => __('Web Design Title', 'tamim-personal'),
        'section' => 'about_section',
        'type' => 'text',
    ));
    
    // Web Design Description 1
    $wp_customize->add_setting('webdesign_desc1', array(
        'default' => 'Need help with designing your website and don’t know where to start? I can create beautiful website designs for your new business, or redesign your old site to improve your conversions and achieve your business goals.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('webdesign_desc1', array(
        'label' => __('Web Design Description 1', 'tamim-personal'),
        'section' => 'about_section',
        'type' => 'textarea',
    ));
    
    // Web Design Description 2
    $wp_customize->add_setting('webdesign_desc2', array(
        'default' => 'Do you need a website that you can easily edit yourself? I can create a fully custom theme for WordPress built just for your needs. WooCommerce can be added on for an easy-to-manage online store with the inventory, payment, and shipping solutions you need.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('webdesign_desc2', array(
        'label' => __('Web Design Description 2', 'tamim-personal'),
        'section' => 'about_section',
        'type' => 'textarea',
    ));
    
    // Web Design Image
    $wp_customize->add_setting('webdesign_image', array(
        'default' => get_template_directory_uri() . '/img/about.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'webdesign_image', array(
        'label' => __('Web Design Image', 'tamim-personal'),
        'section' => 'about_section',
    )));
    
    // Custom Programming Title
    $wp_customize->add_setting('programming_title', array(
        'default' => 'Custom Programming',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('programming_title', array(
        'label' => __('Programming Title', 'tamim-personal'),
        'section' => 'about_section',
        'type' => 'text',
    ));
    
    // Custom Programming Description 1
    $wp_customize->add_setting('programming_desc1', array(
        'default' => 'Looking for an experienced WordPress developer for your project? I can help with custom themes, functions, and plugins for WordPress and WooCommerce.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('programming_desc1', array(
        'label' => __('Programming Description 1', 'tamim-personal'),
        'section' => 'about_section',
        'type' => 'textarea',
    ));
    
    // Custom Programming Description 2
    $wp_customize->add_setting('programming_desc2', array(
        'default' => 'My previous projects include interactive maps, chat forums, sortable product listings, product feeds for external sites, and more.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('programming_desc2', array(
        'label' => __('Programming Description 2', 'tamim-personal'),
        'section' => 'about_section',
        'type' => 'textarea',
    ));
    
    // Programming Image
    $wp_customize->add_setting('programming_image', array(
        'default' => get_template_directory_uri() . '/img/about-img.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'programming_image', array(
        'label' => __('Programming Image', 'tamim-personal'),
        'section' => 'about_section',
    )));
    
    // ================== Grow Section ==================
    $wp_customize->add_section('grow_section', array(
        'title' => __('Grow Section', 'tamim-personal'),
        'panel' => 'homepage_settings',
        'priority' => 30,
    ));
    
    // Grow Background
    $wp_customize->add_setting('grow_bg', array(
        'default' => get_template_directory_uri() . '/img/grow-section-bg.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'grow_bg', array(
        'label' => __('Grow Section Background', 'tamim-personal'),
        'section' => 'grow_section',
    )));
    
    // Grow Title
    $wp_customize->add_setting('grow_title', array(
        'default' => 'Transform Your Business with a Powerful Website',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('grow_title', array(
        'label' => __('Grow Section Title', 'tamim-personal'),
        'section' => 'grow_section',
        'type' => 'text',
    ));
    
    // Grow Description 1
    $wp_customize->add_setting('grow_desc1', array(
        'default' => 'Your website isn’t just a page — it’s your digital shop. I help you turn visitors into customers through smart design and clean code.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('grow_desc1', array(
        'label' => __('Grow Description 1', 'tamim-personal'),
        'section' => 'grow_section',
        'type' => 'textarea',
    ));
    
    // Grow Description 2
    $wp_customize->add_setting('grow_desc2', array(
        'default' => 'As a Web Developer, I create websites that not only look great but also perform — helping your business grow and reach new audiences.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('grow_desc2', array(
        'label' => __('Grow Description 2', 'tamim-personal'),
        'section' => 'grow_section',
        'type' => 'textarea',
    ));
    
    // Total Projects
    $wp_customize->add_setting('total_projects', array(
        'default' => '20+',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('total_projects', array(
        'label' => __('Total Projects', 'tamim-personal'),
        'section' => 'grow_section',
        'type' => 'text',
    ));
    
    // Support Text
    $wp_customize->add_setting('support_text', array(
        'default' => '24/7',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('support_text', array(
        'label' => __('Support Text', 'tamim-personal'),
        'section' => 'grow_section',
        'type' => 'text',
    ));
    
    // Grow Video
    $wp_customize->add_setting('grow_video', array(
        'default' => get_template_directory_uri() . '/img/grow-section-video.mp4',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'grow_video', array(
        'label' => __('Grow Section Video', 'tamim-personal'),
        'description' => __('Upload MP4 video for grow section', 'tamim-personal'),
        'section' => 'grow_section',
        'mime_type' => 'video',
    )));
    
    // ================== Work Process Section ==================
    $wp_customize->add_section('work_process_section', array(
        'title' => __('Work Process Section', 'tamim-personal'),
        'panel' => 'homepage_settings',
        'priority' => 40,
    ));
    
    // Work Process Subtitle
    $wp_customize->add_setting('work_subtitle', array(
        'default' => 'Our Working Process',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('work_subtitle', array(
        'label' => __('Work Process Subtitle', 'tamim-personal'),
        'section' => 'work_process_section',
        'type' => 'text',
    ));
    
    // Work Process Title
    $wp_customize->add_setting('work_title', array(
        'default' => 'How Our Services Will Help You to Grow Your Business',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('work_title', array(
        'label' => __('Work Process Title', 'tamim-personal'),
        'section' => 'work_process_section',
        'type' => 'textarea',
    ));
    
    // Step 1
    $wp_customize->add_setting('step1_title', array(
        'default' => 'Discovery',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('step1_title', array(
        'label' => __('Step 1 Title', 'tamim-personal'),
        'section' => 'work_process_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('step1_desc', array(
        'default' => 'In the discovery phase, I analyze your business goals, target audience, and design preferences...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('step1_desc', array(
        'label' => __('Step 1 Description', 'tamim-personal'),
        'section' => 'work_process_section',
        'type' => 'textarea',
    ));
    
    // Step 2
    $wp_customize->add_setting('step2_title', array(
        'default' => 'Planning',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('step2_title', array(
        'label' => __('Step 2 Title', 'tamim-personal'),
        'section' => 'work_process_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('step2_desc', array(
        'default' => 'Once the goals are clear, I plan the website structure, layout, and technology stack...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('step2_desc', array(
        'label' => __('Step 2 Description', 'tamim-personal'),
        'section' => 'work_process_section',
        'type' => 'textarea',
    ));
    
    // Step 3
    $wp_customize->add_setting('step3_title', array(
        'default' => 'Execute',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('step3_title', array(
        'label' => __('Step 3 Title', 'tamim-personal'),
        'section' => 'work_process_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('step3_desc', array(
        'default' => 'In this stage, I start designing and developing your website...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('step3_desc', array(
        'label' => __('Step 3 Description', 'tamim-personal'),
        'section' => 'work_process_section',
        'type' => 'textarea',
    ));
    
    // Step 4
    $wp_customize->add_setting('step4_title', array(
        'default' => 'Deliver',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('step4_title', array(
        'label' => __('Step 4 Title', 'tamim-personal'),
        'section' => 'work_process_section',
        'type' => 'text',
    ));
    
    $wp_customize->add_setting('step4_desc', array(
        'default' => 'After complete testing, your website is launched and made live...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('step4_desc', array(
        'label' => __('Step 4 Description', 'tamim-personal'),
        'section' => 'work_process_section',
        'type' => 'textarea',
    ));
    
    // Work Process Images
    $steps = array('step1', 'step2', 'step3', 'step4');
    $step_images = array(
        'data-discovery.png',
        'planning.png',
        'project-plan.png',
        'delivery.png'
    );
    
    foreach ($steps as $index => $step) {
        $wp_customize->add_setting($step . '_image', array(
            'default' => get_template_directory_uri() . '/img/' . $step_images[$index],
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, $step . '_image', array(
            'label' => sprintf(__('Step %d Image', 'tamim-personal'), $index + 1),
            'section' => 'work_process_section',
        )));
    }
    
    // ================== Build Section ==================
    $wp_customize->add_section('build_section', array(
        'title' => __('Build Section', 'tamim-personal'),
        'panel' => 'homepage_settings',
        'priority' => 50,
    ));
    
    // Build Section Text 1
    $wp_customize->add_setting('build_text1', array(
        'default' => 'We Carry More Than Just Good Coding Skills',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('build_text1', array(
        'label' => __('Build Section Text 1', 'tamim-personal'),
        'section' => 'build_section',
        'type' => 'text',
    ));
    
    // Build Section Text 2
    $wp_customize->add_setting('build_text2', array(
        'default' => "Let's Build Your Website!",
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('build_text2', array(
        'label' => __('Build Section Text 2', 'tamim-personal'),
        'section' => 'build_section',
        'type' => 'text',
    ));
    
    // Build Section Image
    $wp_customize->add_setting('build_image', array(
        'default' => get_template_directory_uri() . '/img/build-img.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'build_image', array(
        'label' => __('Build Section Image', 'tamim-personal'),
        'section' => 'build_section',
    )));
    
    // Inner Content Text 1
    $wp_customize->add_setting('inner_text1', array(
        'default' => 'Web Service',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('inner_text1', array(
        'label' => __('Inner Content Text 1', 'tamim-personal'),
        'section' => 'build_section',
        'type' => 'text',
    ));
    
    // Inner Content Text 2
    $wp_customize->add_setting('inner_text2', array(
        'default' => 'Perfect Solution for Web Services!',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('inner_text2', array(
        'label' => __('Inner Content Text 2', 'tamim-personal'),
        'section' => 'build_section',
        'type' => 'text',
    ));
    
    // ================== Social Media Links ==================
    $wp_customize->add_section('social_media_section', array(
        'title' => __('Social Media Links', 'tamim-personal'),
        'panel' => 'homepage_settings',
        'priority' => 60,
    ));
    
    $social_platforms = array(
        'facebook' => 'Facebook URL',
        'linkedin' => 'LinkedIn URL',
        'upwork' => 'Upwork/Portfolio URL',
        'fiverr' => 'Fiverr URL',
        'twitter' => 'Twitter URL'
    );
    
    foreach ($social_platforms as $platform => $label) {
        $wp_customize->add_setting($platform . '_url', array(
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control($platform . '_url', array(
            'label' => __($label, 'tamim-personal'),
            'section' => 'social_media_section',
            'type' => 'url',
        ));
    }
    
}
add_action('customize_register', 'tamim_homepage_customizer');



// COLOR 

