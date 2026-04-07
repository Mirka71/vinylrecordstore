<?php  
/**
 * Template Name: Homepage Template
 */

get_header(); ?>

<main id="main-content" class="site-main">
    <?php 
    // loop to fetch and display blocks
    while (have_posts()) :
        the_post();
        the_content();
    endwhile;
    ?>
</main>
<?php get_footer(); ?>