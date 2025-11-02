<?php
/*
 * Theme Front Page 
*/

get_header(); ?>

  <section id="service_area">
    <div class="container">
      <div class="row">
        <?php 
        // 1. সঠিক পেজ নম্বর (paged) ভেরিয়েবল সেট করা
        // এটি স্ট্যাটিক ফ্রন্ট পেজ ('page') এবং সাধারণ আর্কাইভ ('paged') উভয় ক্ষেত্রেই কাজ করবে
        if ( get_query_var( 'paged' ) ) {
            $paged = get_query_var( 'paged' );
        } elseif ( get_query_var( 'page' ) ) {
            $paged = get_query_var( 'page' );
        } else {
            $paged = 1;
        }

        // 2. query_posts এর পরিবর্তে WP_Query ব্যবহার করা
        $args = array(
            'post_type'      => 'service',
            'post_status'    => 'publish',
            'posts_per_page' => 3,
            'order'          => 'ASC',
            'paged'          => $paged // এখানে সঠিক paged ভেরিয়েবল ব্যবহার করা হলো
        );
        $service_query = new WP_Query( $args );

        // 3. নতুন WP_Query অবজেক্ট দিয়ে লুপ চালানো
        if( $service_query->have_posts() ) :
          while( $service_query->have_posts() ) : $service_query->the_post(); 
        ?>
        <div class="col-md-4">
          <div class="child_service">
          <h2 class="custom_post_title"><?php the_title(); ?></h2>
          <?php echo the_post_thumbnail('service') ?>
          <span class="custom_post_des"><?php the_excerpt(); ?></span>
          <span><a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</a></span>

          </div>
        </div>

        <?php 
          endwhile;
        //   endif; // এই endif এখানে হবে না, লুপের পরে হবে
        ?>

        <div id="page_nav">
    <?php 
    // 4. পেজিনেশন ফাংশনকে কাস্টম কোয়েরি সম্পর্কে জানানো
    // আপনার ali_pagenav ফাংশনটি গ্লোবাল $wp_query ব্যবহার করে।
    // তাই আমরা পেজিনেশন কল করার আগে $wp_query-কে আমাদের $service_query দিয়ে প্রতিস্থাপন করবো।

    global $wp_query; // গ্লোবাল $wp_query অ্যাক্সেস করি
    $temp_query = $wp_query; // মূল $wp_query সেভ করে রাখি
    $wp_query   = $service_query; // $wp_query-কে আমাদের কাস্টম কোয়েরি সেট করি

    // 5. ফাংশনটি সঠিকভাবে চেক করা
    if ( function_exists('ali_pagenav') ) {
        ali_pagenav(); 
    } else { 
    ?>
        <?php next_posts_link(); ?>
        <?php previous_posts_link(); ?>
    <?php 
    } 

    // 6. মূল $wp_query রিস্টোর করা
    $wp_query = $temp_query;
    wp_reset_postdata(); // কাস্টম লুপের পরে এটি কল করা অত্যন্ত গুরুত্বপূর্ণ
    
    // 7. এখন লুপের if(have_posts()) কন্ডিশনটি শেষ করতে হবে
    else:
        echo '<p>No services found.</p>';
    endif; 
    ?>
</div>

      </div>
    </div>
  </section>



<?php get_footer(); ?>