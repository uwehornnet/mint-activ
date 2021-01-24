<?php

add_action('init', 'register_references');
function register_references()
{
    $labels = array(
        'name' => _x('Referenzen', 'post type general name'),
        'singular_name' => _x('Referenz', 'post type singular name'),
        'add_new' => _x('Neue Referenz', 'Newsletter'),
        'add_new_item' => __('Neue Referenz'),
        'edit_item' => __('Referenz bearbeiten'),
        'new_item' => __('Neue Referenz'),
        'view_item' => __('Referenzen ansehen'),
        'search_items' => __('Referenzen suchen'),
        'not_found' => __('Keine Referenzen gefunden'),
        'not_found_in_trash' => __('Keine Referenzen im Papierkorb'),
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
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array('title', 'editor', 'excerpt', 'page-attributes', 'thumbnail'),
    );

    register_post_type('references', $args);
    flush_rewrite_rules();
}