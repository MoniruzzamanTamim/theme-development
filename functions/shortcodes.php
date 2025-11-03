<?php

// Short For Custom Post With pagination 
function service_shotcodes( $atts ) {
    // আউটপুট বাফারিং শুরু করা
    ob_start();

    // 1. সঠিক 'paged' ভেরিয়েবল সেট করা
    // এটি স্ট্যাটিক ফ্রন্ট পেজ ('page') এবং সাধারণ আর্কাইভ ('paged') উভয় ক্ষেত্রেই কাজ করবে
    $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
    $paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : $paged;

    // 2. WP_Query আর্গুমেন্ট সেট করা, এবং paged ভেরিয়েবল যোগ করা
    $query = new WP_Query( array(
        'post_type'      => 'service',
        'posts_per_page' => 3,
        'order'          => 'ASC',
        'orderby'        => 'title',
        'paged'          => $paged // এই লাইনটি যোগ করা হয়েছে
    ));

    if ( $query->have_posts() ) { ?>

    <section id="service_area">
        <div class="container">
            <div class="row">
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <div class="col-md-4">
                        <div class="child_service">
                            <h2><?php the_title(); ?></h2>
                            <?php echo the_post_thumbnail('service') ?>
                            <?php the_excerpt(); ?>
                            <span><a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</a></span>
                        </div>
                    </div>
                <?php endwhile; ?>
                
            </div>
        </div>
    </section>

    <?php
    $total_pages = $query->max_num_pages;

    if ( $total_pages > 1 ) {
        echo '<div id="page_nav-short" class="text-center  short_page_nav">'; // আপনার পেজিনেশন ক্লাস দিন
        echo paginate_links( array(
            'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'format'    => '?paged=%#%',
            'current'   => max(1, $paged),
            'total'     => $total_pages,
            'prev_text' => __('&laquo; Prev'),
            'next_text' => __('Next &raquo;'),
            'type'      => 'list' // Bootstrap ব্যবহারের জন্য 'list' ব্যবহার করলে সুবিধা
        ) );
        echo '</div>';
    }
    ?>
    
    <?php
    } // if ( $query->have_posts() ) এর ক্লোজিং ব্র্যাকেট
    
    // 4. ডেটা রিসেট এবং আউটপুট রিটার্ন করা
    wp_reset_postdata(); 
    $myvariable = ob_get_clean();
    return $myvariable;
}
add_shortcode( 'services', 'service_shotcodes');





// Short Code generated For Slider Option

// 📸 Shortcode: [slider] বা [slider category="home-page-slider"]
function tamim_slider_shortcode( $atts ) {
    // 🔧 Shortcode attributes
    $atts = shortcode_atts( array(
        'category' => '',         // ক্যাটাগরি নির্দিষ্ট না থাকলে ফাঁকা থাকবে
        'posts_per_page' => -1,   // সব পোস্ট দেখাবে
    ), $atts, 'slider' );

    // 🔍 মূল query arguments
    $args = array(
        'post_type'      => 'slider',
        'posts_per_page' => $atts['posts_per_page'],
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'ASC',
    );

    // 🧩 যদি shortcode-এ category নির্দিষ্ট করা থাকে
    if ( !empty( $atts['category'] ) && strtolower($atts['category']) !== 'all' ) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category', // ✅ CPT-তে category enable থাকতে হবে
                'field'    => 'slug',
                'terms'    => sanitize_title($atts['category']),
            ),
        );
    }

    $query = new WP_Query( $args );
    ob_start();

    if ( $query->have_posts() ) : ?>
    <section class="shortcode_slider_section">
        <div class="owl-carousel owl-theme slider-shortcode">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="slider_item">
                    <?php if ( has_post_thumbnail() ) : ?>
                       <?php the_post_thumbnail('median', array('class' => 'slider_image'));  ?>
                    <?php endif; ?>
                    <?php if ( get_the_content() ) : ?>
                            <p><?php the_content(); ?></p>
                        <?php endif; ?>
                
                </div>
            <?php endwhile; ?>
        </div>
    </section>
    <?php 
    endif;

    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode( 'slider', 'tamim_slider_shortcode' );

