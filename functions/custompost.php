<?php
/*
@Package TAMIM Theme
====================================
        CUSTOM POST TYPE FUNCTION
====================================
*/
?>

<?php

function tamim_custom_post() {
    register_post_type('service', array(
        'labels' => array(
            'name'               => __('Services', 'tamim-personal'),
            'singular_name'      => __('Service', 'tamim-personal'),
            'add_new'            => __('Add New Service', 'tamim-personal'),
            'add_new_item'       => __('Add New Service', 'tamim-personal'),
            'edit_item'          => __('Edit Service', 'tamim-personal'),
            'new_item'           => __('New Service', 'tamim-personal'),
            'view_item'          => __('View Service', 'tamim-personal'),
            'not_found'          => __('Sorry, We couldn\'t find any service.', 'tamim-personal'),
        ),
        'menu_icon'           => 'dashicons-admin-network',
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,   // এখানে typo ছিল (exclude_form_search → exclude_from_search)
        'menu_position'       => 5,
        'has_archive'         => true,
        'show_ui'             => true,
        'capability_type'     => 'post',
        'rewrite'             => array('slug' => 'service'), // এখানে 'slag' → 'slug' হতে হবে
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
    ));
      register_taxonomy(
        'service_category',       // taxonomy slug
        'service',                // linked post type
        array(
            'labels' => array(
                'name'          => __('Service Categories', 'tamim-personal'),
                'singular_name' => __('Service Category', 'tamim-personal'),
            ),
            'hierarchical' => true, // true = category type, false = tag type
            'public'        => true,
            'show_ui'       => true,
            'show_admin_column' => true,
            'rewrite'       => array('slug' => 'service-category'),
        )
    );
}
add_action('init', 'tamim_custom_post');



// Custom Post Type: Service

function tamim_slider_post_type() {
    register_post_type('slider', array(
        'labels' => array(
            'name'               => __('Slider', 'tamim-personal'),
            'singular_name'      => __('Slider', 'tamim-personal'),
            'add_new'            => __('Add New Slider', 'tamim-personal'),
            'add_new_item'       => __('Add New Slider', 'tamim-personal'),
            'edit_item'          => __('Edit Slider', 'tamim-personal'),
            'new_item'           => __('New Slider', 'tamim-personal'),
            'view_item'          => __('View Slider', 'tamim-personal'),
            'not_found'          => __('Sorry, We couldn\'t find any Slider.', 'tamim-personal'),
        ),
        'menu_icon'           => 'dashicons-slides',
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,   // এখানে typo ছিল (exclude_form_search → exclude_from_search)
        'menu_position'       => 6,
        'has_archive'         => true,
        'show_ui'             => true,
        'capability_type'     => 'post',
        'rewrite'             => array('slug' => 'slider'), // এখানে 'slag' → 'slug' হতে হবে
        'taxonomies' => array('category'), // ✅ default category enable
        'supports' => array('title','editor','thumbnail')
    ));
     
}
add_action('init', 'tamim_slider_post_type');