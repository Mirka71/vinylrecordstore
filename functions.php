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

// NEW ARRIVAL RECORD SHORTCODE
function new_arrival_record($atts){
    // default attributes
    $pairs = shortcode_atts(array(
        'name' => 'New Record',
        'artist' => 'Unknown Artist'
    ), $atts);
    // output into html
    $output = '<div class="new-arrival-badge">';
    $output .= '<span class="arrival-label">New Arrival</span>';
    $output .= '<h2 class="arrival-name">' . esc_html($pairs['name']) . '</h2>';
    $output .= '<p class="arrival-artist">by ' . esc_html($pairs['artist']) . '</p>';
    $output .= '</div>';
    return $output;
}// call function
add_shortcode('new_arrival', 'new_arrival_record');

// STORE HOUR SHORTCODE
function record_store_hours($atts){
    // attributes
    $pairs = shortcode_atts(array(
        'title' => 'Store Hours'
    ), $atts);
    // html output as list
    $output = '<div class="store-hours">';
    $output .= '<h2 class="store-hours-title">' . esc_html($pairs['title']) . '</h2>';
    $output .= '<ul class="store-hours-list">';
    $output .= '<li>
                    <span class="day">Monday - Friday</span>
                    <span class="hours">9:30am - 8:30pm</span>
                </li>';
    $output .= '<li>
                    <span class="day">Saturday - Sunday</span>
                    <span class="hours">12:00pm - 4:00pm</span>
                </li>';
    $output .= '</ul>';
    $output .= '</div>';
    return $output;
}
add_shortcode('store_hours', 'record_store_hours');

// FOOTER WIDGET LOGO
function recordstore_widgets_init(){
    register_sidebar(array(
        'name' => __('Footer Widget Area One', 'recordstore'),
        'id' => 'footer-widget-area-one',
        'description' => __('First footer widget area', 'recordstore'),
        'before_widget' => '<div class="logo-widget">',
        'after_widget' => '</div>'
    ));
    
// FOOTER WIDGET AREA 2 HOME
    register_sidebar(array(
        'name' => __('Footer Widget Area Two', 'recordstore'),
        'id' => 'footer-widget-area-two',
        'description' => __('Second footer widget area', 'recordstore'),
        'before_widget' => '<div class="home-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="widget-title">',
        'after_title' => '</h6>',
    ));

}