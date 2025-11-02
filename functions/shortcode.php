<?php 


// ShortCode Create


function normal_shortcode(){
    return "Hello This is a Normal ShortCode";
}
add_shortcode('normal_shortcode', 'normal_shortcode');

//🥉 ধাপ ৩: Attribute সহ Shortcode বানাও
function tamim_greet_user_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'name' => 'Guest',
        ),
        $atts,
        'greet'
    );
    return "Hello, " . esc_html($atts['name']) . "!";
}
add_shortcode('greet', 'tamim_greet_user_shortcode');


// //🧱 ধাপ ৪: HTML সহ Shortcode (যেমন – Button)

// function tamim_button_shortcode() {
//     return '<a href="#" class="btn btn-primary">Click Me</a>';
// }
// add_shortcode('button', 'tamim_button_shortcode');

//🧱 ধাপ ৪: HTML & Attibute সহ Shortcode (যেমন – Button)

function tamim_button_shortcode($atts) {
    // Attribute set করা
    $atts = shortcode_atts(
        array(
            'url' => '#',  // Default URL
        ),
        $atts
    );

    // HTML button আউটপুট
    return '<a href="' . esc_url($atts['url']) . '" class="btn btn-primary">Click Me</a>';
}

// Shortcode register করা
add_shortcode('button', 'tamim_button_shortcode');

//Use ShortCode [button url="www.test.com"]




//Short Code and Custom Post 

// Shortcode & Custom Post
function service_shotcode( $atts ) {
  ob_start();
  $query = new WP_Query( array(
    'post_type' => 'service',
    'posts_per_page' => 3,
    'order' => 'ASC',
    'orderby' => 'title',
  ));
  if ( $query -> have_posts()) { ?>

  <section id="service_area">
    <div class="container">
      <div class="row">
        <?php while ( $query -> have_posts () ) : $query->the_post(); ?>
        <div class="col-md-4  ">
          <div class="child_service">
          <h2><?php the_title(); ?></h2>
          <?php echo the_post_thumbnail('service') ?>
          <?php the_excerpt(  ); ?>
          </div>
        </div>

        <?php  endwhile; wp_reset_postdata(); ?>
      </div>
    </div>
  </section>

  
    <?php $myvariable = ob_get_clean();
    return $myvariable;
  }
}
add_shortcode( 'service', 'service_shotcode');
