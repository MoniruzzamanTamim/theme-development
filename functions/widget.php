<?php 

// ===================================
function tamim_sidebar_setting() {
    // ====================BLOG PPAGE SIDEBAR ===============
    register_sidebar(array(
        'name'          => __('Blog Sidebar ', 'tamim-personal'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'tamim-personal'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    // FOOTER SECTION SIDEBAR -1 
    register_sidebar(array(
        'name'          => __('FOOTER-ONE  ', 'tamim-personal'),
        'id'            => 'footer-sidebar-1',
        'description'   => __('Add widgets here to appear in your  Footer sidebar.', 'tamim-personal'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'tamim_sidebar_setting');

