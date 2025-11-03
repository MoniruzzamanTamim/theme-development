<!-- This Templete Use Show blog Related Details Details -->
<!-- #Start Blog Page Code here-->
<div class="main-part blog_part"> 
                        <?php 
                        if(have_posts( )):
                            while(have_posts( )): the_post();
                        ?>
                        <div class="blog-area" >
                            <div class="blog-image">
                                <a href="<?php the_permalink(); ?>" target="_blank" rel="noopener noreferrer">
                                    <?php 
                                    if(has_post_thumbnail()): the_post_thumbnail('post_thumbnail');
                                    endif;
                                    ?>
                                </a>
                            </div>
                            <div class="blog-content">
                                <h6> <?php the_category(', '); ?> | Tags: <?php the_tags('', ',');  ?> </h6>
                               <h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h2>
                               <p><?php the_excerpt(); ?></p>
                               <span><a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</a></span>
                            </div>
                        </div>
                        <?php
                        endwhile;
                            else:
                              _e('no Post Found');
                        endif; 
                        ?>
                    </div>

<div id="page_nav">
            <?php if ('ali_pagenav') {ali_pagenav(); } else{ ?>
                <?php next_posts_link(); ?>
                <?php previous_posts_link(); ?>
                <?php } ?>
</div>

<!-- #END Blog Page Code here-->