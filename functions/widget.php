<?php 


function tamim_sidebar_setting() {
    register_sidebar(array(
        'name'          => __('Sidebar Widget', 'tamim-personal'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'tamim-personal'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'tamim_sidebar_setting');

