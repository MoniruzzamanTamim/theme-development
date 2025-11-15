<?php
/*
 * Theme Front Page 
*/
// Header Section Start =============================================
get_header(); ?>
<!-- //Header Section END ============================================= -->
<!-- Banner Slider Section Satrt Here ==================================-->
<section class="banner-section" >
  <div id="banner-slider" class="owl-carousel owl-theme">
  <div id="slider-item-one" class="slider-item d-flex align-items-center">
        <div class="container">
          <div class="row">
            <div class="col xl-6">
              <div class="slider-content ">
                  <h1>Hello,</h1>
                  <h2>My name Md Moniruzzaman Tamim</h2>
                  <h3>I'M <span class=texteffect></span><span>|</span></h3>
                  <div class="social-media">
                    <span><i class="fa fa-facebook"></i></span>
                    <span><i class="fa fa-linkedin"></i></span>
                    <span><i class="fa fa-briefcase"></i></span>
                    <span><?php echo file_get_contents(get_template_directory() . '/img/fiverr.svg'); ?></span>
                    <span><i class="fa fa-twitter"></i></span>
                  </div>
                  <div class="banner-btn">
                    <button type="button" class="wp-element-button">Contact Me</button>
                    <?php $cv_pdf_url = get_theme_mod('cv_pdf_file'); ?>
                    <a href="<?php echo esc_url($cv_pdf_url); ?>" class="download-cv-button wp-element-button" download>
                    <?php _e('Download CV', 'tamim-personal'); ?>
                    </a>
                  </div>
              </div>
            </div>
          </div>
        </div>
  </div>
  <div id="slider-item-two" class="slider-item d-flex align-items-center"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/Shapes-Hero-Banner.png'); background-size: cover; background-position: center;  width: 100%;">
    <div class="container">
      <div class="row">
            <div class="col xl-6">
              <div class="slider-content slider-content-two ">
                  <h1>Hello,</h1>
                  <h2>As a Creative Web Designer, I Transform Ideas Into Stunning Digital Experiences That Combine Design, Usability, and Technology</h2>
                  <div class="social-media">
                    <span><i class="fa fa-facebook"></i></span>
                    <span><i class="fa fa-linkedin"></i></span>
                    <span><i class="fa fa-briefcase"></i></span>
                    <span><?php echo file_get_contents(get_template_directory() . '/img/fiverr.svg'); ?></span>
                    <span><i class="fa fa-twitter"></i></span>
                  </div>
                  <div class="banner-btn">
                    <button type="button" class="wp-element-button">Contact Me</button>
                    <?php $cv_pdf_url = get_theme_mod('cv_pdf_file'); ?>
                    <a href="<?php echo esc_url($cv_pdf_url); ?>" class="download-cv-button wp-element-button" download>
                    <?php _e('Download CV', 'tamim-personal'); ?>
                    </a>
                  </div>
              </div>
            </div>

            <div class="col xl 6">
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
  <div id="slider-item-three" class="slider-item"><h1>3</h1></div>
  <div id="slider-item-four" class="slider-item"><h1>4</h1></div>
  <div id="slider-item-five" class="slider-item"><h1>5</h1></div>
  </div>
   
</section>
<!-- Banner Slider Section END  Here =====================================-->

<!-- About Section Start here====================================== -->
<section class="about-section">
    <div class="container">
      <div class="row">
      <div class="row">
      <div class="col-xl-12">
        <div class="about-title text-center">
          <span>What I do</span>
        </div>
      </div>
    </div>
  </div>
<div class="container">
  <div class="row">
    <div class="col-xl-5">
      <div class="about-image"> 
      <img src="<?php echo get_template_directory_uri(); ?>/img/about.png" alt="build-image">
      </div>
    </div>
    <div class="col-xl-7">
      <div class="about-content">
        <h1>Custom Programming</h1>
        <p>Looking for an experienced WordPress developer for your project? I can help with custom themes, functions, and plugins for WordPress and WooCommerce.</p>
        <p>My previous projects include interactive maps, chat forums, sortable product listings, product feeds for external sites, and more.</p>
        <div class="about-service-part">
        <button type="button" class="wp-element-button build-btn ">Contact Me</button>
      </div>
      </div>
    </div>
    

  </div>
 </div>
<div class="container">
  <div class="row">
    <div class="col-xl-5">
      <div class="about-image"> 
      <img src="<?php echo get_template_directory_uri(); ?>/img/about.png" alt="build-image">
      </div>
    </div>
    <div class="col-xl-7">
      <div class="about-content">
        <h1>Web Design & Development</h1>
        <p>Need help with designing your website and don’t know where to start? I can create beautiful website designs for your new business, or redesign your old site to improve your conversions and achieve your business goals.</p>
        <p>Do you need a website that you can easily edit yourself? I can create a fully custom theme for WordPress built just for your needs. WooCommerce can be added on for an easy-to-manage online store with the inventory, payment, and shipping solutions you need.</p>
        <div class="about-service-part">
        <button type="button" class="wp-element-button build-btn ">Contact Me</button>
      </div>
      </div>
    </div>
    

  </div>
 </div>
</section>
<!-- About Section End here====================================== -->
<!-- GroW Section Start here====================================== -->
<section class="grow-section" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/grow-section-bg.png'); background-size: cover; background-position: center;  width: 100%;">
 <div class="container">
  <div class="row">
    <div class="col-xl-5">
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
    <div class="col-xl-7">
      <div class="grow-video">
        <video autoplay muted loop playsinline>
            <source src="<?php echo get_template_directory_uri(); ?>/img/grow-section-video.mp4" type="video/mp4">
                    Your browser does not support the video tag.
        </video>
        <button type="button" class="wp-element-button ">Contact Me</button>
      </div>
    </div>

  </div>
 </div>
</section>
<!-- About Section End here====================================== -->

<!-- work Process Section Start here====================================== -->
<section class="work-process-section">
  <div class="row">
    <div class="container">
      <div class="col-xl-12">
        <div class="work-title text-center">
          <span>Our Working Process</span>
          <h1>How Our Services Will Help You to Grow Your Business</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="work-process">
          <img src="<?php echo get_template_directory_uri(); ?>/img/data-discovery.png" alt="work-process-image">
          <h4>Discovery</h4>
          <p>In the discovery phase, I analyze your business goals, target audience, and design preferences. This step helps to create a clear vision for your website that aligns with your brand and objectives.</p>
          <div class="number">01</div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="work-process">
          <img src="<?php echo get_template_directory_uri(); ?>/img/planning.png" alt="work-process-image">
          <h4>Planning</h4>
          <p>Once the goals are clear, I plan the website structure, layout, and technology stack. A sitemap, project timeline, and content strategy are created to ensure a smooth development process.</p>
          <div class="number">02</div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="work-process">
          <img src="<?php echo get_template_directory_uri(); ?>/img/project-plan.png" alt="work-process-image">
          <h4>Execute</h4>
          <p>In this stage, I start designing and developing your website. Every page is built to be fully responsive, fast-loading, and SEO-friendly, ensuring the best user experience and visibility on search engines.</p>
          <div class="number">03</div>
        </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
        <div class="work-process">
          <img src="<?php echo get_template_directory_uri(); ?>/img/delivery.png" alt="work-process-image">
          <h4>Deliver</h4>
          <p>After complete testing, your website is launched and made live. I also provide post-launch support and basic training so you can manage your site with confidence.</p>
          <div class="number">04</div>
        </div>
      </div>

      
    </div>
  </div>

</section>
<!-- work Process Section End here====================================== -->

<!-- build Section Start here====================================== -->
 <div class="build-section">
  <div class="row">
    <div class="container">
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
<!-- build Section End here====================================== -->



<!-- Home Page Slider Section Start From Custom post  -->
<section class="slider-section ">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12">
        <!-- 🦉 Owl Carousel Section Start -->
        <div id="slider-carousel" class="owl-carousel owl-theme">
          <?php 
          $args = array(
              'post_type'      => 'slider',
              'posts_per_page' => -1,
              'post_status'    => 'publish',
              'orderby'        => 'date',   // ✅ নতুন: সাজানোর ক্রম নির্ধারণ
              'order'          => 'ASC'
          );
          $query = new WP_Query($args);

          if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); 
          ?>
          
          <div class="slider_item"><!-- ✅ Owl Carousel-এ প্রতিটি স্লাইডের জন্য .item ক্লাস দরকার -->
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('median', array('class' => 'slider_image'));  ?>
            <?php endif; ?>
            <?php if (get_the_content()) : ?>
                <p class="text-light"><?php the_content(); ?></p>
              <?php endif; ?>

            <!-- Optional: Caption area -->
          </div>

          <?php 
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
        <!-- 🦉 Owl Carousel Section End -->
      </div>
    </div>
  </div>
</section>
 <!-- Home Page Slider Section END  From Custom Post -->



<!-- Custom Post Type Section Show Front-END  Start -->
<section id="service_area" class="my-5">
  <div class="container">
    <div class="row">
      <?php 
      // 1️⃣ পেজ নম্বর সঠিকভাবে নির্ধারণ
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      // 2️⃣ Custom Query
      $args = array(
        'post_type'      => 'service',
        'post_status'    => 'publish',
        'posts_per_page' => 3,
        'order'          => 'ASC',
        'paged'          => $paged
      );

      $service_query = new WP_Query($args);

      // 3️⃣ লুপ শুরু
      if ($service_query->have_posts()) :
        while ($service_query->have_posts()) : $service_query->the_post(); 
      ?>
        <div class="col-md-4">
          <div class="child_service text-center">
            <?php 
            if (has_post_thumbnail()) {
              the_post_thumbnail('service', array('class' => 'img-fluid mb-3'));
            }
            ?>
            <h2 class="custom_post_title"><?php the_title(); ?></h2>
            <div class="custom_post_des"><?php the_excerpt(); ?></div>
            <a class="btn btn-primary mt-2 wp-element-button service-btn" href="<?php the_permalink(); ?>">Read More</a>
          </div>
        </div>
      <?php 
        endwhile;
      ?>

      <div class="col-12">
        <div id="page_nav" class="text-center mt-4">
          <?php 
          // 4️⃣ Pagination অংশ
          global $wp_query; 
          $temp_query = $wp_query; 
          $wp_query = $service_query; 

          if (function_exists('ali_pagenav')) {
            ali_pagenav(); 
          } else {
            // fallback simple pagination
            next_posts_link('← Older Posts');
            previous_posts_link('Newer Posts →');
          }

          // 5️⃣ মূল query restore করা
          $wp_query = $temp_query; 
          wp_reset_postdata();
          ?>
        </div>
      </div>

      <?php else: ?>
        <div class="col-12 text-center">
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<!-- Custom Post Type Section Show Front-END  END-->

<!-- Footer Section Start -->
<?php get_footer(); ?>
<!-- Footer Section END -->




<section class="py-5"></section>