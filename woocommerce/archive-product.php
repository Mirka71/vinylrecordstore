<?php

// shop page template
//get header
get_header('shop';)

// use shop id to get featured image
$shop_id = wc_get_page_id('shop');
$shopFeaturedImg = wp_get_attachment_image_src(get_post_thmbnail_id($shop_Id), 'full');
$bg_url = $shopFeaturedImg ? $shopFeaturedImg[0] : '';
?>