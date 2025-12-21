<?php
/*
 * Theme Front Page 
*/
// Header Section Start =============================================
get_header(); ?>
<!-- //Header Section END ============================================= -->
<!-- Banner Slider Section Satrt Here ==================================-->
<section class="banner-section front-page" >
  <div id="banner-slider" class="owl-carousel owl-theme">
    <div id="slider-item-one" class="slider-item d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col xl-6 col-lg-6 col-md-6 col-sm-12 col-12 d-flex align-items-center">
              <div class="slider-content ">
                  <h1>Hello,</h1>
                  <h2>My name Md Moniruzzaman Tamim</h2>
                  <h2>I am <span id="typewriter"></span><span class="cursor">|</span></h2>
                  <!-- Text Animation -->
                  <div class="social-media">
                    <span><i class="fa fa-facebook"></i></span>
                    <span><i class="fa fa-linkedin"></i></span>
                    <span><i class="fa fa-briefcase"></i></span>
                    <span><?php echo file_get_contents(get_template_directory() . '/img/fiverr.svg'); ?></span>
                    <span><i class="fa fa-twitter"></i></span>
                  </div>
                  <div class="banner-btn">
                    <button type="button" class="wp-element-button banner-btn">Contact Me</button>
                    <?php $cv_pdf_url = get_theme_mod('cv_pdf_file'); ?>
                    <a href="<?php echo esc_url($cv_pdf_url); ?>" class="download-cv-button wp-element-button banner-btn" download>
                    <?php _e('Download CV', 'tamim-personal'); ?>
                    </a>
                  </div>
              </div>
            </div>
            <div class="col xl-6 col-lg-6 col-md-6 col-sm-12 d-none d-sm-block">
              <div class="slider-video ">
       <video autoplay muted  playsinline>
            <source src="<?php echo get_template_directory_uri(); ?>/img/Programming.mp4" type="video/mp4">
                    Your browser does not support the video tag.
        </video>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div id="slider-item-two" class="slider-item d-flex align-items-center"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/Shapes-Hero-Banner.png'); background-size: cover; background-position: center;  width: 100%;">
    <div class="container">
      <div class="row">
            <div class="col xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
              <div class="slider-content slider-content-two  ">
                  <h1>Hello,</h1>
                  <h2>As a Creative Web Designer, I Transform Ideas Into Stunning Digital Experiences That Combine Design, Usability, and Technology</h2>
                  <div class="social-media">
                    <a href="https://www.facebook.com/moniruzzamantamim99/" target="_blank" rel="noopener noreferrer">
    <span><i class="fa fa-facebook"></i></span>
</a>
                    <span><i class="fa fa-linkedin"></i></span>
                    <span><i class="fa fa-briefcase"></i></span>
                    <span><?php echo file_get_contents(get_template_directory() . '/img/fiverr.svg'); ?></span>
                    <span><i class="fa fa-twitter"></i></span>
                  </div>
                  <div class="banner-btn">
                    <button type="button" class="wp-element-button banner-btn">Contact Me</button>
                    <?php $cv_pdf_url = get_theme_mod('cv_pdf_file'); ?>
                    <a href="<?php echo esc_url($cv_pdf_url); ?>" class="download-cv-button wp-element-button banner-btn" download>
                    <?php _e('Download CV', 'tamim-personal'); ?>
                    </a>
                  </div>
              </div>
            </div>

            <div class="col xl-6 col-lg-6 col-md-6 col-sm-12">
              <div class="slider-two-right">
                <div class="slider-two-image ">
                <img src="<?php echo get_template_directory_uri(); ?>/img/slide-two-image.png" alt="slide-two-image">
                <div class="inner-image">
                <img src="<?php echo get_template_directory_uri(); ?>/img/slider-two-inner.png" alt="slide-two-image">
                </div>
                <div class="inner-image-two">
                <img src="<?php echo get_template_directory_uri(); ?>/img/slider-two-inner-2.png" alt="slide-two-image">
                </div>
              </div>

              </div>
            </div>


      </div>
    </div>

    </div>
  </div>
   
</section>
<!-- Banner Slider Section END  Here =====================================-->

<!-- About Section Start here====================================== -->
<section class="about-section">

  <!-- Title -->
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="about-title text-center">
          <span>What I do</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Section 1 -->

  <div class="container py-5 mb-5 ">
    <div class="row align-items-center">
      <div class="col-xl-5 col-lg-5 col-md-5">
        <div class="about-image"> 
          <img src="<?php echo get_template_directory_uri(); ?>/img/about.png" alt="build-image">
        </div>
      </div>

      <div class="col-xl-7 col-lg-7 col-md-7">
        <div class="about-content">
          <h1>Web Design & Development</h1>
          <p>Need help with designing your website and don’t know where to start? I can create beautiful website designs for your new business, or redesign your old site to improve your conversions and achieve your business goals.</p>
          <p>Do you need a website that you can easily edit yourself? I can create a fully custom theme for WordPress built just for your needs. WooCommerce can be added on for an easy-to-manage online store with the inventory, payment, and shipping solutions you need.</p>

          <div class="about-service-part">
            <button type="button" class="wp-element-button about-btn">See All</button>
            <button type="button" class="wp-element-button about-btn">Contact Me</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Section 2 -->
   <div class="container py-5 mt-5">
    <div class="row align-items-center">
      <div class="col-xl-5 col-lg-5 col-md-5">
        <div class="about-image"> 
          <img src="<?php echo get_template_directory_uri(); ?>/img/about-img.png" alt="build-image">
        </div>
      </div>

      <div class="col-xl-7 col-lg-7 col-md-7">
        <div class="about-content">
          <h1>Custom Programming</h1>
          <p>Looking for an experienced WordPress developer for your project? I can help with custom themes, functions, and plugins for WordPress and WooCommerce.</p>
          <p>My previous projects include interactive maps, chat forums, sortable product listings, product feeds for external sites, and more.</p>

          <div class="about-service-part">
            <button type="button" class="wp-element-button about-btn">See All</button>
            <button type="button" class="wp-element-button about-btn">Contact Me</button>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- About Section End here====================================== -->
<!-- GroW Section Start here====================================== -->
<section class="grow-section " style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/grow-section-bg.png'); background-size: cover; background-position: center;  width: 100%;">
 <div class="container">
  <div class="row">
    <div class="col-xl-5 col-lg-5 col-md-5">
      <div class="grow-content">
        <h1>Transform Your Business with a Powerful Website</h1>
        <p>Your website isn’t just a page — it’s your digital shop. I help you turn visitors into customers through smart design and clean code.</p>
        <p>As a Web Developer, I create websites that not only look great but also perform — helping your business grow and reach new audiences.</p>
        <div class="grow-service-part">
        <div class="g-service">
          <h3>20+ </h3>
          <span>Total project</span>
        </div>
        <div class="g-service">
          <h3>24/7 </h3>
          <span>Support Lifetime</span>
        </div>
      </div>
      </div>
    </div>
    <div class="col-xl-7 col-lg-7 col-md-7">
      <div class="grow-video">
        <video autoplay muted loop playsinline>
            <source src="<?php echo get_template_directory_uri(); ?>/img/grow-section-video.mp4" type="video/mp4">
                    Your browser does not support the video tag.
        </video>
        <button type="button" class="wp-element-button grow-button">Contact Me</button>
      </div>
    </div>

  </div>
 </div>
</section>
<!-- About Section End here====================================== -->

<!-- work Process Section Start here====================================== -->
<section class="work-process-section ">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="work-title text-center">
          <span>Our Working Process</span>
          <h1>How Our Services Will Help You to Grow Your Business</h1>
        </div>
      </div>
    </div>

    <div class="row">
      <!-- Step 1 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 overflow-hidden">
        <div class="work-process">
          <img src="<?php echo get_template_directory_uri(); ?>/img/data-discovery.png" alt="work-process-image">
          <h4>Discovery</h4>
          <p>In the discovery phase, I analyze your business goals, target audience, and design preferences...</p>
          <div class="number">01</div>
        </div>
      </div>

      <!-- Step 2 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 overflow-hidden">
        <div class="work-process">
          <img src="<?php echo get_template_directory_uri(); ?>/img/planning.png" alt="work-process-image">
          <h4>Planning</h4>
          <p>Once the goals are clear, I plan the website structure, layout, and technology stack...</p>
          <div class="number">02</div>
        </div>
      </div>

      <!-- Step 3 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 overflow-hidden">
        <div class="work-process">
          <img src="<?php echo get_template_directory_uri(); ?>/img/project-plan.png" alt="work-process-image">
          <h4>Execute</h4>
          <p>In this stage, I start designing and developing your website...</p>
          <div class="number">03</div>
        </div>
      </div>

      <!-- Step 4 -->
      <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 overflow-hidden">
        <div class="work-process">
          <img src="<?php echo get_template_directory_uri(); ?>/img/delivery.png" alt="work-process-image">
          <h4>Deliver</h4>
          <p>After complete testing, your website is launched and made live...</p>
          <div class="number">04</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- work Process Section End here====================================== -->

<!-- build Section Start here====================================== -->
<div class="build-section ">
  <div class="row">
    <div class="container">
      <div class="col-xl-12 col-lg-12">
        <div class="build-content">
        <p>We Carry More Than Just Good Coding Skills</p>
        <h3>Let's Build Your Website!</h3>
      </div>
      <div class="build-image">
        <img src="<?php echo get_template_directory_uri(); ?>/img/build-img.png" alt="build-image">
        <div class="build-img-inner-content">
          <p>Web Service</p>
          <h3>Perfect Solution for Web Services!</h3>
          <button type="button" class="wp-element-button build-btn ">Contact Me</button>
        </div>
      </div>
      
      </div>
    </div>
  </div>
 </div>
<!-- build Section End here====================================== -->

<section class="service-section">
<?php echo do_shortcode('[services]'); ?>
</section>

<!-- Footer Section Start -->
<?php get_footer(); ?>
<!-- Footer Section END -->


