<?php
// ===========Set Thumble on Blog and Page=============

add_theme_support('post-thumbnails');
add_image_size('post-thumbnails', 970, 350, true);


function my_theme_setup(){
  add_theme_support('post-thumbnails');
  add_theme_support('post-formats', ['aside ', 'gallery ', 'image', 'audio', 'video', 'chat']);
}
add_action('after_setup_theme', 'my_theme_setup');

// ===========Set Pagination On  Post Section=============
function ali_pagenav(){
  global $wp_query, $wp_rewrite;
  $pages ='';
  $max = $wp_query->max_num_pages;
  if(!$current = get_query_var('paged')) $current = 1;
  $args['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $args['total'] = $max;
  $args['current'] = $current;
  $total = 1;
  $args['prev_text'] = 'Prev';
  $args['next_text'] = 'Next';
  if ($max > 1) echo '</pre>
    <div class="wp_pagenav">';
      if ($total == 1 && $max > 1) $pages = '<p class="pages"> Page ' .$current . '<span>of</span>' . $max . '</p>';
      echo $pages . paginate_links($args);
      if ($max > 1 ) echo '</div><pre>';
}


// Bolg Post Description Except to 40 Word
// Custom Excerpt "Read More" Button
function tamim_excerpt_more($more){
    global $post;
    return '<br><br><a class="redmore btn btn-primary wp-element-button blog_post_btn" href="'. get_permalink($post->ID) .'">Read More</a>';
}
add_filter('excerpt_more', 'tamim_excerpt_more');

// Limit excerpt to 40 words
function tamim_excerpt_length($length){
    return 40;
}
add_filter('excerpt_length', 'tamim_excerpt_length', 999);
