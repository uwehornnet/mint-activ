<?php

/**
 * theme support
 */
add_theme_support('custom-header');
add_theme_support('post-thumbnails');

/**
 * add image sizes
 */
add_image_size('small', 240, 240);
add_image_size('medium', 480, 480);

/*
 * register navigations
 */
register_nav_menus([
    'hauptmenu' => esc_html__('Hauptmenu', 'template'),
    'sekundarmenu' => esc_html__('Sekundarmenu', 'template'),
    'footermenu' => esc_html__('Footermenu', 'template'),
    'servicemenu' => esc_html__('Servicemenu', 'template'),
]);

/*
 * jquery deactivation
 */
if (!is_admin()) {
    wp_deregister_script('jquery');
}

/*
 * register sidebar
 */
register_sidebar([
    'id' => 'service',
    'name' => 'Service',
]);

/**
 * kill the admin nag
 */
if (!current_user_can('edit_users')) {
    add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
    add_filter('pre_option_update_core', create_function('$a', 'return null;'));
}

/**
 * allow svg upload
 */
define('ALLOW_UNFILTERED_UPLOADS', true);
function add_svg_to_upload_mimes($upload_mimes)
{
    $upload_mimes['svg'] = 'image/svg+xml';
    $upload_mimes['svgz'] = 'image/svg+xml';
    return $upload_mimes;
}

add_filter('upload_mimes', 'add_svg_to_upload_mimes');


include 'reference-cpt.php';
include 'downloads-cpt.php';