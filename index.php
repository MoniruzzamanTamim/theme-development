<!-- Header Section -->
<?php get_header();?>
<!-- Header Section End  -->

<!-- Blog Section Start  -->
<section class="blog-section py-5">
    <div class="container">
        <div class="row">

            <!-- Blog Posts Area -->
            <div class="col-xl-9">
                <?php 
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); 
                ?>
                    <div class="blog-area mb-5 border-bottom pb-4">
                        
                        <!-- Featured Image -->
                        <div class="blog-image mb-3">
                            <a href="<?php the_permalink(); ?>">
                                <?php 
                                if ( has_post_thumbnail() ) : 
                                    the_post_thumbnail('medium_large', [
                                        'class' => 'img-fluid w-100 rounded',
                                        'alt'   => get_the_title(),
                                    ]);
                                endif;
                                ?>
                            </a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <h2 class="mb-2">
                                <a href="<?php the_permalink(); ?>" class="text-dark text-decoration-none">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <div class="post-meta mb-2 text-muted small">
                                <span>By <?php the_author(); ?></span> | 
                                <span><?php echo get_the_date(); ?></span> | 
                                <span>Category: <?php the_category(', '); ?></span>
                            </div>

                            <p><?php the_excerpt(); ?></p>

                            <div class="tags text-muted small">
                                <?php the_tags('<strong>Tags:</strong> ', ', ', ''); ?>
                            </div>
                            <a class="btn btn-sm btn-primary mt-3" href="<?php the_permalink(); ?>">
                                Read More
                            </a>
                        </div>
                    </div>
                <?php 
                    endwhile;
                else :
                    echo '<h3>No Posts Found</h3>';
                endif;
                ?>	 
                 <div id="page_nav">
            <?php if ('ali_pagenav') {ali_pagenav(); } else{ ?>
                <?php next_posts_link(); ?>
                <?php previous_posts_link(); ?>
            <?php } ?>
          </div>
            </div>

            <!-- Sidebar Area -->
            <div class="col-xl-3">
                <h4><?php get_sidebar(); ?></h4>
            </div>

        </div>
    </div>
</section>
<!-- Blog Section End  -->

<!-- Footer Section  -->
<?php get_footer(); ?>
<!-- 	 	Footer Section End  -->