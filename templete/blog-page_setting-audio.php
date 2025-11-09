<div class="main-part blog_part row"> 
    <?php 
    if(have_posts()):
        while(have_posts()): the_post();
    ?>
    <div class="col-md-6 mb-4 h-100"> <!-- 2 columns inside the 8-col main area -->
        <div class="blog-area">
          
            <div class="blog-image">
                <a href="<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                    <?php 
                    if(has_post_thumbnail()): 
                        the_post_thumbnail('medium', ['class' => 'img-fluid']); 
                    endif;
                    ?>
                </a>
            </div>
            <div class="blog-content">
              <div class="blog_content_customise d-flex justify-content-between">
                <h6><?php the_category(', '); ?></h6>
                <h6 class="blog-time"><i class="fa fa-calendar"></i> <span><?php echo get_the_date('F j, Y'); ?></span></h6>
              </div>
              <span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ) ?>"></span>
                <h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p ><?php the_excerpt(); ?></p>
                <span><a class="btn btn-primary wp-element-button blog_post_btn" href="<?php the_permalink(); ?>">Read More</a></span>
            </div>
        </div>
    </div>
    <?php
        endwhile;
    else:
        _e('No posts found');
    endif; 
    ?>
</div>

<!-- Pagination -->
<div id="page_nav" class="mt-4">
    <?php 
    if (function_exists('ali_pagenav')) { 
        ali_pagenav(); 
    } else { 
        next_posts_link('Older Posts'); 
        previous_posts_link('Newer Posts'); 
    } 
    ?>
</div>
