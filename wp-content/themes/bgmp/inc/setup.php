<?php

add_filter('acf/settings/load_json', 'define_json_load_point');


function define_json_load_point( $paths )
{
    // remove original path (optional)
    unset($paths[0]);

    // append path
    $paths[] = get_template_directory() . '/inc/acf-json';

    // return
    return $paths;

}

add_filter('acf/settings/save_json', 'define_json_save_point');


function define_json_save_point( $path ) {

    // update path
    $path = get_template_directory() . '/inc/acf-json';

    // return
    return $path;

}