<?php 

// ======================================================================
//For Show Thumbnail Image Function
// Enable featured images
add_theme_support('post-thumbnails');
add_image_size('post-thumbnails', 970, 350, true);
// =======================================================

// Pagination Function
function ali_pagenav() {
    global $wp_query, $wp_rewrite;

    $pages = '';
    $max = $wp_query->max_num_pages;

    if ($max <= 1) return; // No pagination needed if only one page

    $current = get_query_var('paged') ? get_query_var('paged') : 1;

    $args = array(
        'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
        'format'    => '?paged=%#%',
        'current'   => max(1, $current),
        'total'     => $max,
        'prev_text' => __('« Prev'),
        'next_text' => __('Next »'),
        'type'      => 'array'
    );

    $pages = paginate_links($args);

    if (is_array($pages)) {
        echo '<div class="wp_pagenav">';
        echo '<span class="pages">Page ' . $current . ' of ' . $max . '</span>';
        echo '<ul class="pagination">';
        foreach ($pages as $page) {
            echo '<li>' . $page . '</li>';
        }
        echo '</ul>';
        echo '</div>';
    }
}
