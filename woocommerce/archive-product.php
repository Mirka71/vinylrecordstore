<?php
// prevent users from accessing fle
if (!defined('ABSPATH')) exit;
// shop page template
//get header
get_header('shop');

// use shop id to get featured image
$shop_id = wc_get_page_id('shop');
$shopFeaturedImg = wp_get_attachment_image_src(get_post_thumbnail_id($shop_id), 'full');
$bg_url = $shopFeaturedImg ? $shopFeaturedImg[0] : '';
?>

<!-- for hero image and added classes to later style in stylesheet -->
<section class="hero-image" <?php if ($bg_url) : ?>style="--background-image: url('<?php echo esc_url($bg_url); ?>');"<?php endif; ?>>
    <div class="hero-content text-white">
        <h1><?php woocommerce_page_title(); ?></h1>
    </div>
</section>

<!-- sidebar -->
<main class="shop-layout-container">
    <!-- making the SIDEBAR -->
     <aside class="shop">
        <?php
        // checks if user added widgets to shop sidebar in WP admin
        if (is_active_sidebar('shop-sidebar')) : dynamic_sidebar('shop-sidebar');

        // display by genre if no sidebar widgets show
        else : ?> 
        <div class="widget">
            <h3>Browse by Genre</h3>
            <?php wp_list_categories(array(
                'taxonomy' => 'product_cat',
                'title_li' => ''
            )); ?>
            </div>
            <?php endif; ?>
        </aside>

        <!-- Main shop content (main woocommerce function)-->
        <section class="shop-content">
            <?php woocommerce_content(); ?>
        </section>

    </main>
<?php get_footer('shop'); ?>