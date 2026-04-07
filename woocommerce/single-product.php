<?php
// prevent users from accessing fle
if (!defined('ABSPATH')) exit;

get_header('shop'); ?>
get_footer('shop'); ?>

<main id="main" class="record-main custom-record-wrapper">
    
    <div class="record-navigation">
        <?php
        // BREADCRUMBS
         woocommerce_breadcrumb( array(
                'delimiter'   => ' <span class="breadcrumb-slash">/</span> ',
                'wrap_before' => '<nav class="woocommerce-breadcrumb">',
                'wrap_after'  => '</nav>',
                'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
            ) );
        ?>
        </div>

        <?php
        // LOOP --> product details
         while ( have_posts() ) : the_post(); 
        global $product; 
        $product_id = $product->get_id();
        // ACF gets "genre"
        $genre = get_field('genre', $product_id);
        ?>

        <article id="product-<?php the_ID(); ?>" <?php wc_product_class( 'product-layout-grid', $product ); ?>>

         <div class="record-gallery-container">
            <?php 
                // loads product images
                do_action( 'woocommerce_before_single_product_summary' ); 
            ?>
        </div>