<?php

function app_get_media ()
{  
    $media = array_map(function($post){
        return [
            'id' => strtolower($post['name']) . '-' . $post['object']->ID,
            'name' => $post['name'],
            'link' => $post['object']->guid
        ];
    },get_field('media', $_GET['id']));
    
    return $media;
}

add_action('rest_api_init', function () {
    register_rest_route('app/v1', 'get_media', ['methods' => 'GET', 'callback' => 'app_get_media']);
});
