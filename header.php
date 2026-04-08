<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
    <head>
        <!-- Character encoding -->
        <meta charset="<?php bloginfo('charset'); ?>">
        <!-- Responsive layout -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php wp_head(); ?>

        <!-- stylesheet link-->
        <link rel="stylesheet" href="<?php echo esc_url(home_url('wp-content/themes/vinylrecordshop/style.css')); ?>">
    </head>

    <body <?php body_class(); ?>>
        <!-- Header -->
        <header class="main-header navbar">
            <a href="<?php echo esc_url(home_url()); ?>">
                <!-- Image -->
                <img src="<?php echo esc_url(home_url('wp-content/themes/vinylrecordshop/orangevinyl.avif')); ?>" alt="Image of an orange vinyl record.">
            </a>      

    <!-- Navbar -->
    <nav>
        <?php
            wp_nav_menu(array(
                'menu' => 'main',
                'theme_location' => 'header',
                'depth' => 2,
                'fallback_cb' => false
            ));
        ?>
    </nav>
</header>