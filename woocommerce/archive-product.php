<?php
// prevent users from accessing fle
if (!defined('ABSPATH')) exit;
// shop page template
//get header
get_header('shop';)

// use shop id to get featured image
$shop_id = wc_get_page_id('shop');
$shopFeaturedImg = wp_get_attachment_image_src(get_post_thmbnail_id($shop_Id), 'full');
$bg_url = $shopFeaturedImg ? $shopFeaturedImg[0] : '';
?>

// for hero image and added classes to later style in stylesheet
<section class="hero-image" <?php if ($bg_url) : ?>style="--background-image: url('<?php echo esc_url($bg_url); ?>');"<?php endif; ?>>
    <div class="hero-content text-white">
        <h1><?php woocommerce_page_title(); ?></h1>
    </div>
</section>