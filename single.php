<?php
get_header();
?>

<main class="container">

<?php

if(have_posts()) : 
    while (have_posts()) : the_post();
?>

<!-- SINGLE POST -->
 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

 <!-- Post title -->
  <section class="heading">
    <h1><?php the_title(); ?></h1>

    <div class="post-meta">
        <p>Posted on: <?php the_date(); ?></p>
        <p>By: <?php the_author(); ?></p>

        <!-- Categories -->
        <p>Genre: <?php the_category(', '); ?></p>

        <!-- Tags -->
         <p>Tags: <?php the_tags('', ', '); ?></p>
    </div>
 </section>
                <?php if (has_post_thumbnail()): ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); // Automatically generates <img> tag  ?>
                    </div>
                <?php endif; ?>
                <section class="entry-content">
                    <?php the_content(); ?>
                </section>
            </article>
<?php 
            endwhile;
        endif;
    ?>        
</main>
<?php get_footer(); ?>