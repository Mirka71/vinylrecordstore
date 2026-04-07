<?php
get_header();
?>

main class="container">

<?php

if(have_posts()) : 
    while (have_posts()) : the_post();
?>

<!-- SINGLE POST -->
 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

 <!-- Post title -->
  <section class="heading">
    <h1><?php the_title(); ?></h1>