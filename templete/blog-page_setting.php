<!-- This Templete Use Show Page Details -->


<div class="main-part">
    <?php 
        if(have_posts( )):
           while(have_posts( )): the_post();
    ?>
            <div class="Page-section">
                <h4><?php the_title(); ?></h4>
                <div class="post-image">
                    <?php 
                    if(has_post_thumbnail()): 
                        the_post_thumbnail('medium', ['class' => 'img-fluid']); 
                    endif;
                    ?>
                </div>
                <div class="page-content">
                <?php the_content(); ?>
                 </div>
            </div>
            <?php
            endwhile;
        else:
          _e('no Post Found');
        endif; 
    ?>
</div>

