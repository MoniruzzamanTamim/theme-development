<?php
/*
 * Theme Front Page 
*/
// Header Section Start =============================================
get_header(); ?>
<!-- //Header Section END ============================================= -->

<!-- Home Page Slider Section Start From Custom post  -->
<section class="slider-section">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-12">
        <!-- 🦉 Owl Carousel Section Start -->
        <div class="owl-carousel owl-theme">
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
            <a class="btn btn-primary mt-2" href="<?php the_permalink(); ?>">Read More</a>
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


 