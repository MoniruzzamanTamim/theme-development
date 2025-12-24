<?php
/*
 * Theme Front Page 
*/
get_header(); ?>

<!-- Banner Slider Section -->
<section class="banner-section front-page">
  <div id="banner-slider" class="owl-carousel owl-theme">
    <!-- Slider Item 1 -->
    <div id="slider-item-one" class="slider-item d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col xl-6 col-lg-6 col-md-6 col-sm-12 col-12 d-flex align-items-center">
              <div class="slider-content ">
                  <h1><?php echo esc_html(get_theme_mod('slider1_title', 'Hello,')); ?></h1>
                  <h2><?php echo esc_html(get_theme_mod('slider1_name', 'My name Md Moniruzzaman Tamim')); ?></h2>
                  <h2>I am <span id="typewriter"></span><span class="cursor">|</span></h2>
                  <!-- Text Animation -->
                  <div class="social-media">
                    <?php if(get_theme_mod('facebook_url')): ?>
                    <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" target="_blank" rel="noopener noreferrer">
                        <span><i class="fa fa-facebook"></i></span>
                    </a>
                    <?php endif; ?>
                    
                    <?php if(get_theme_mod('linkedin_url')): ?>
                    <a href="<?php echo esc_url(get_theme_mod('linkedin_url')); ?>" target="_blank" rel="noopener noreferrer">
                        <span><i class="fa fa-linkedin"></i></span>
                    </a>
                    <?php endif; ?>
                    
                    <?php if(get_theme_mod('upwork_url')): ?>
                    <a href="<?php echo esc_url(get_theme_mod('upwork_url')); ?>" target="_blank" rel="noopener noreferrer">
                        <span><i class="fa fa-briefcase"></i></span>
                    </a>
                    <?php endif; ?>
                    
                    <?php if(get_theme_mod('fiverr_url')): ?>
                    <a href="<?php echo esc_url(get_theme_mod('fiverr_url')); ?>" target="_blank" rel="noopener noreferrer">
                        <span><?php echo file_get_contents(get_template_directory() . '/img/fiverr.svg'); ?></span>
                    </a>
                    <?php endif; ?>
                    
                    <?php if(get_theme_mod('twitter_url')): ?>
                    <a href="<?php echo esc_url(get_theme_mod('twitter_url')); ?>" target="_blank" rel="noopener noreferrer">
                        <span><i class="fa fa-twitter"></i></span>
                    </a>
                    <?php endif; ?>
                  </div>
                  <div class="banner-btn">
                    <button type="button" class="banner-btn home-btn">Contact Me</button>
                    <?php $cv_pdf_url = get_theme_mod('cv_pdf_file'); ?>
                    <?php if($cv_pdf_url): ?>
                    <a href="<?php echo esc_url($cv_pdf_url); ?>" class="download-cv-button banner-btn home-btn" download>
                        <?php _e('Download CV', 'tamim-personal'); ?>
                    </a>
                    <?php endif; ?>
                  </div>
              </div>
            </div>
            <div class="col xl-6 col-lg-6 col-md-6 col-sm-12 d-none d-sm-block">
              <div class="slider-video">
                <?php $slider1_video = get_theme_mod('slider1_video', get_template_directory_uri() . '/img/Programming.mp4'); ?>
                <?php if($slider1_video): ?>
                <video autoplay muted playsinline>
                    <source src="<?php echo esc_url($slider1_video); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
    </div>
    
    <!-- Slider Item 2 -->
    <?php $slider2_bg = get_theme_mod('slider2_bg', get_template_directory_uri() . '/img/Shapes-Hero-Banner.png'); ?>
    <div id="slider-item-two" class="slider-item d-flex align-items-center" style="background-image: url('<?php echo esc_url($slider2_bg); ?>'); background-size: cover; background-position: center; width: 100%;">
        <div class="container">
            <div class="row">
                <div class="col xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="slider-content slider-content-two">
                        <h1><?php echo esc_html(get_theme_mod('slider2_title', 'Hello,')); ?></h1>
                        <h2><?php echo esc_html(get_theme_mod('slider2_description', 'As a Creative Web Designer, I Transform Ideas Into Stunning Digital Experiences That Combine Design, Usability, and Technology')); ?></h2>
                         <div class="social-media">
                    <?php if(get_theme_mod('facebook_url')): ?>
                    <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" target="_blank" rel="noopener noreferrer">
                        <span><i class="fa fa-facebook"></i></span>
                    </a>
                    <?php endif; ?>
                    
                    <?php if(get_theme_mod('linkedin_url')): ?>
                    <a href="<?php echo esc_url(get_theme_mod('linkedin_url')); ?>" target="_blank" rel="noopener noreferrer">
                        <span><i class="fa fa-linkedin"></i></span>
                    </a>
                    <?php endif; ?>
                    
                    <?php if(get_theme_mod('upwork_url')): ?>
                    <a href="<?php echo esc_url(get_theme_mod('upwork_url')); ?>" target="_blank" rel="noopener noreferrer">
                        <span><i class="fa fa-briefcase"></i></span>
                    </a>
                    <?php endif; ?>
                    
                    <?php if(get_theme_mod('fiverr_url')): ?>
                    <a href="<?php echo esc_url(get_theme_mod('fiverr_url')); ?>" target="_blank" rel="noopener noreferrer">
                        <span><?php echo file_get_contents(get_template_directory() . '/img/fiverr.svg'); ?></span>
                    </a>
                    <?php endif; ?>
                    
                    <?php if(get_theme_mod('twitter_url')): ?>
                    <a href="<?php echo esc_url(get_theme_mod('twitter_url')); ?>" target="_blank" rel="noopener noreferrer">
                        <span><i class="fa fa-twitter"></i></span>
                    </a>
                    <?php endif; ?>
                  </div>git 
                        <div class="banner-btn">
                            <button type="button" class="home-btn banner-btn">Contact Me</button>
                            <?php $cv_pdf_url = get_theme_mod('cv_pdf_file'); ?>
                            <?php if($cv_pdf_url): ?>
                            <a href="<?php echo esc_url($cv_pdf_url); ?>" class="download-cv-button home-btn banner-btn" download>
                                <?php _e('Download CV', 'tamim-personal'); ?>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="slider-two-right">
                        <div class="slider-two-image">
                            <?php $slider2_img = get_theme_mod('slider2_image', get_template_directory_uri() . '/img/slide-two-image.png'); ?>
                            <?php if($slider2_img): ?>
                            <img src="<?php echo esc_url($slider2_img); ?>" alt="slide-two-image">
                            <?php endif; ?>
                            
                            <?php $slider2_inner1 = get_theme_mod('slider2_inner1', get_template_directory_uri() . '/img/slider-two-inner.png'); ?>
                            <?php if($slider2_inner1): ?>
                            <div class="inner-image">
                                <img src="<?php echo esc_url($slider2_inner1); ?>" alt="slide-two-image">
                            </div>
                            <?php endif; ?>
                            
                            <?php $slider2_inner2 = get_theme_mod('slider2_inner2', get_template_directory_uri() . '/img/slider-two-inner-2.png'); ?>
                            <?php if($slider2_inner2): ?>
                            <div class="inner-image-two">
                                <img src="<?php echo esc_url($slider2_inner2); ?>" alt="slide-two-image">
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

<!-- About Section -->
<section class="about-section">
    <!-- Title -->
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="about-title text-center">
                    <span><?php echo esc_html(get_theme_mod('about_title', 'What I do')); ?></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 1: Web Design -->
    <div class="container py-5 mb-5">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-5 col-md-5">
                <div class="about-image">
                    <?php $webdesign_img = get_theme_mod('webdesign_image', get_template_directory_uri() . '/img/about.png'); ?>
                    <?php if($webdesign_img): ?>
                    <img src="<?php echo esc_url($webdesign_img); ?>" alt="web-design-image">
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-xl-7 col-lg-7 col-md-7">
                <div class="about-content">
                    <h1><?php echo esc_html(get_theme_mod('webdesign_title', 'Web Design & Development')); ?></h1>
                    <p><?php echo esc_html(get_theme_mod('webdesign_desc1', 'Need help with designing your website and don\'t know where to start? I can create beautiful website designs for your new business, or redesign your old site to improve your conversions and achieve your business goals.')); ?></p>
                    <p><?php echo esc_html(get_theme_mod('webdesign_desc2', 'Do you need a website that you can easily edit yourself? I can create a fully custom theme for WordPress built just for your needs. WooCommerce can be added on for an easy-to-manage online store with the inventory, payment, and shipping solutions you need.')); ?></p>

                    <div class="about-service-part">
                        <button type="button" class="home-btn common-btn about-btn">See All</button>
                        <button type="button" class="home-btn common-btn about-btn">Contact Me</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section 2: Custom Programming -->
    <div class="container py-5 mt-5">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-5 col-md-5">
                <div class="about-image">
                    <?php $programming_img = get_theme_mod('programming_image', get_template_directory_uri() . '/img/about-img.png'); ?>
                    <?php if($programming_img): ?>
                    <img src="<?php echo esc_url($programming_img); ?>" alt="programming-image">
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-xl-7 col-lg-7 col-md-7">
                <div class="about-content">
                    <h1><?php echo esc_html(get_theme_mod('programming_title', 'Custom Programming')); ?></h1>
                    <p><?php echo esc_html(get_theme_mod('programming_desc1', 'Looking for an experienced WordPress developer for your project? I can help with custom themes, functions, and plugins for WordPress and WooCommerce.')); ?></p>
                    <p><?php echo esc_html(get_theme_mod('programming_desc2', 'My previous projects include interactive maps, chat forums, sortable product listings, product feeds for external sites, and more.')); ?></p>

                    <div class="about-service-part">
                        <button type="button" class="common-btn about-btn home-btn">See All</button>
                        <button type="button" class="common-btn about-btn home-btn">Contact Me</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Grow Section -->
<?php $grow_bg = get_theme_mod('grow_bg', get_template_directory_uri() . '/img/grow-section-bg.png'); ?>
<section class="grow-section" style="background-image: url('<?php echo esc_url($grow_bg); ?>'); background-size: cover; background-position: center; width: 100%;">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-5">
                <div class="grow-content">
                    <h1><?php echo esc_html(get_theme_mod('grow_title', 'Transform Your Business with a Powerful Website')); ?></h1>
                    <p><?php echo esc_html(get_theme_mod('grow_desc1', 'Your website isn\'t just a page — it\'s your digital shop. I help you turn visitors into customers through smart design and clean code.')); ?></p>
                    <p><?php echo esc_html(get_theme_mod('grow_desc2', 'As a Web Developer, I create websites that not only look great but also perform — helping your business grow and reach new audiences.')); ?></p>
                    <div class="grow-service-part">
                        <div class="g-service">
                            <h3><?php echo esc_html(get_theme_mod('total_projects', '20+')); ?></h3>
                            <span>Total project</span>
                        </div>
                        <div class="g-service">
                            <h3><?php echo esc_html(get_theme_mod('support_text', '24/7')); ?></h3>
                            <span>Support Lifetime</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7">
                <div class="grow-video">
                    <?php $grow_video = get_theme_mod('grow_video', get_template_directory_uri() . '/img/grow-section-video.mp4'); ?>
                    <?php if($grow_video): ?>
                    <video autoplay muted loop playsinline>
                        <source src="<?php echo esc_url($grow_video); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    <?php endif; ?>
                    <button type="button" class="home-btn grow-button">Contact Me</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Work Process Section -->
<section class="work-process-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="work-title text-center">
                    <span><?php echo esc_html(get_theme_mod('work_subtitle', 'Our Working Process')); ?></span>
                    <h1><?php echo esc_html(get_theme_mod('work_title', 'How Our Services Will Help You to Grow Your Business')); ?></h1>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Step 1 -->
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 overflow-hidden">
                <div class="work-process">
                    <?php $step1_img = get_theme_mod('step1_image', get_template_directory_uri() . '/img/data-discovery.png'); ?>
                    <?php if($step1_img): ?>
                    <img src="<?php echo esc_url($step1_img); ?>" alt="work-process-image">
                    <?php endif; ?>
                    <h4><?php echo esc_html(get_theme_mod('step1_title', 'Discovery')); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('step1_desc', 'In the discovery phase, I analyze your business goals, target audience, and design preferences...')); ?></p>
                    <div class="number">01</div>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 overflow-hidden">
                <div class="work-process">
                    <?php $step2_img = get_theme_mod('step2_image', get_template_directory_uri() . '/img/planning.png'); ?>
                    <?php if($step2_img): ?>
                    <img src="<?php echo esc_url($step2_img); ?>" alt="work-process-image">
                    <?php endif; ?>
                    <h4><?php echo esc_html(get_theme_mod('step2_title', 'Planning')); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('step2_desc', 'Once the goals are clear, I plan the website structure, layout, and technology stack...')); ?></p>
                    <div class="number">02</div>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 overflow-hidden">
                <div class="work-process">
                    <?php $step3_img = get_theme_mod('step3_image', get_template_directory_uri() . '/img/project-plan.png'); ?>
                    <?php if($step3_img): ?>
                    <img src="<?php echo esc_url($step3_img); ?>" alt="work-process-image">
                    <?php endif; ?>
                    <h4><?php echo esc_html(get_theme_mod('step3_title', 'Execute')); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('step3_desc', 'In this stage, I start designing and developing your website...')); ?></p>
                    <div class="number">03</div>
                </div>
            </div>

            <!-- Step 4 -->
            <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 overflow-hidden">
                <div class="work-process">
                    <?php $step4_img = get_theme_mod('step4_image', get_template_directory_uri() . '/img/delivery.png'); ?>
                    <?php if($step4_img): ?>
                    <img src="<?php echo esc_url($step4_img); ?>" alt="work-process-image">
                    <?php endif; ?>
                    <h4><?php echo esc_html(get_theme_mod('step4_title', 'Deliver')); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('step4_desc', 'After complete testing, your website is launched and made live...')); ?></p>
                    <div class="number">04</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Build Section -->
<div class="build-section">
    <div class="row">
        <div class="container">
            <div class="col-xl-12 col-lg-12">
                <div class="build-content">
                    <p><?php echo esc_html(get_theme_mod('build_text1', 'We Carry More Than Just Good Coding Skills')); ?></p>
                    <h3><?php echo esc_html(get_theme_mod('build_text2', 'Let\'s Build Your Website!')); ?></h3>
                </div>
                <div class="build-image">
                    <?php $build_img = get_theme_mod('build_image', get_template_directory_uri() . '/img/build-img.png'); ?>
                    <?php if($build_img): ?>
                    <img src="<?php echo esc_url($build_img); ?>" alt="build-image">
                    <?php endif; ?>
                    <div class="build-img-inner-content">
                        <p><?php echo esc_html(get_theme_mod('inner_text1', 'Web Service')); ?></p>
                        <h3><?php echo esc_html(get_theme_mod('inner_text2', 'Perfect Solution for Web Services!')); ?></h3>
                        <button type="button" class="home-btn build-btn">Contact Me</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Service Section -->
<section class="service-section">
    <?php echo do_shortcode('[services]'); ?>
</section>

<?php get_footer(); ?>