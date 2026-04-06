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