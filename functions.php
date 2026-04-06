<?php 
// function to display menu in WP admin
function vinyl_record_theme_setup(){
    register_nav(array(
        'header' => 'Header menu',
        'footer' => 'Footer menu'
    
    ));
}
add_action('after_setup_theme', 'theme_setup');

// adding featured img to posts
add_theme_support('post-thumbnails');

// add stylesheet to function
function my_theme_enqueue_assets(){
    get_template_directory_uri() . '/style.css'
}

// create post type for records
function post_type_records(){
// labels that will appear in the menu
$labels = array(
    'name' => 'Records',
    'singular_name' => 'Record',
    'add_new' => 'Add New Record',
    'all_items' => 'All Records',
    'menu_name' => 'Vinyl Records'
);
$args = array(
    'labels' => $labels,
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-album', // found at: https://developer.wordpress.org/resource/dashicons/#media-video
    'supports', => array('title', 'editor', 'thumbnail', 'excerpt'),
    'show_in_rest' => true,
);
register_post_type('records', $args);
}
// run function to run custom post type
add_action('init', 'post_type_records');

// Create shortcode for a new arrival record
function new_arrival_record($atts){
    // default attributes
    $pairs = shortcode_atts(array(
        'name' => 'New Record',
        'artist' => 'Unknown Artist'
    ), $atts);
}

