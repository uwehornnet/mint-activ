<?php

add_action('init', 'register_downloads');
function register_downloads()
{
    $labels = array(
        'name' => _x('Downloads', 'post type general name'),
        'singular_name' => _x('Download', 'post type singular name'),
        'add_new' => _x('Neuer Download', 'Newsletter'),
        'add_new_item' => __('Neuer Download'),
        'edit_item' => __('Download bearbeiten'),
        'new_item' => __('Neuer Download'),
        'view_item' => __('Download ansehen'),
        'search_items' => __('Downloads suchen'),
        'not_found' => __('Keine Downloads gefunden'),
        'not_found_in_trash' => __('Keine Downloads im Papierkorb'),
        'parent_item_colon' => ''
    );

    $args = array(
        'exclude_from_search' => true,
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'page',
        'hierarchical' => true,
        'has_archive' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-cloud',
        'supports' => array('title', 'editor', 'excerpt', 'page-attributes', 'thumbnail'),
    );

    register_post_type('downloads', $args);
    flush_rewrite_rules();
}