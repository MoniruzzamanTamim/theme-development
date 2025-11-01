<?php
/*
 * Theme Front Page 
*/


get_header(); ?>

  <section id="service_area">
    <div class="container">
      <div class="row">
        <?php 
        query_posts('post_type=service&post_status=publish&posts_per_page=3&order=ASC&paged='. get_query_var('post')); 

        if(have_posts()) :
          while(have_posts()) : the_post(); 
        ?>
        <div class="col-md-4">
          <div class="child_service">
          <a class="custom_post_title"  href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <span  class="custom_post_img">  <?php echo the_post_thumbnail('service') ?></span>
          <span class="custom_post_des"><?php the_excerpt(  ); ?></span>
        <span><a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</a></span>

          </div>
        </div>

        <?php 
          endwhile;
          endif;
        ?>
      </div>
    </div>
  </section>
<div id="page_nav">
            <?php if ('ali_pagenav') {ali_pagenav(); } else{ ?>
                <?php next_posts_link(); ?>
                <?php previous_posts_link(); ?>
                <?php } ?>
</div>


<?php get_footer(); ?>