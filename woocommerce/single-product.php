<?php
// prevent users from accessing fle
if (!defined('ABSPATH')) exit;

get_header('shop'); ?>

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

        // get product id
        $record_id = $product->get_id();
        // ACF gets "genre"
        $genre = get_field('genre', $record_id);
        ?>

        <article id="product-<?php the_ID(); ?>" <?php wc_product_class( 'record-layout-grid', $product ); ?>>

         <div class="record-gallery-container">
            <?php 
                // loads product images
                do_action( 'woocommerce_before_single_product_summary' ); 
            ?>
        </div>

        <div class="record-summary">
            <div class="summary-content">
                
                <?php if ( $genre ) : ?>
                    <span class="record-badge"><?php echo esc_html( $genre ); ?></span>
                <?php endif; ?>

                <h1 class="record-title"><?php the_title(); ?></h1>

                <!-- show price -->
                <div class="record-price-row">
                    <?php echo $record->get_price_html(); ?>
                </div>

                <!-- to show blurb -->
                <div class="record-description">
                    <?php the_excerpt(); ?>
                </div>

                <!-- shows add to cart button -->
                <div class="record-actions-box">
                    <?php woocommerce_template_single_add_to_cart(); ?>
                </div>

                <?php 
                // custom data pulled from ACF for artist and year
                $artist = get_field('artist', $product_id);
                $year   = get_field('release_year', $product_id);

                if ($artist || $year) : ?>
                <div class="record-specs-container">
                    <h3 class="specs-title">Record Details</h3>
                    <ul class="specs-list">

                        <!-- ARTIST -->
                        <?php if($artist) : ?>
                            <li>
                                <span class="spec-label">Artist</span>
                                <span class="span-value"><?php echo esc_html($artist); ?></span>
                            </li>
                            <?php endif; ?>
                        <!-- YEAR -->
                             <?php if($year) : ?>
                            <li>
                                <span class="spec-label">Release Year</span>
                                <span class="span-value"><?php echo esc_html($year); ?></span>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <!-- PRODUCT META
                     load footer ad make SKU -->
                     <div class="record-meta-footer">
                        <?php do_action('woocommerce_product_meta_start'); ?>

                        <span class="sku_wrapper">
                            SKU: <?php echo ($sku = $product->get_sku()) ? $sku : 'N/A'; ?>
                        </span>

                        <?php do_action('woocommerce_product_meta_end'); ?>
                    </div>
                </div>
            </div>
        </article>

        <!-- Add tabs and related products -->
        <section class="record-extra-info">
            <?php woocommerce_output_product_data_tabs(); ?>
            <?php woocommerce_output_related_products(); ?>
        </section>
        <?php endwhile; ?>


    </main>
get_footer('shop'); ?>
