<footer>
    <section class="footer">

    <!-- AREA ONE LOGO -->
     <div class="first widget-area">
        <a href="<?php echo esc_url(home_url()); ?>">
            <?php dynamic_sidebar('footer-widget-area-one'); ?>
        </a>
    </div>

    <!-- AREA TWO HOME -->
      <div class="second widget-area">
            <?php dynamic_sidebar('footer-widget-area-two'); ?>
    </div>

      <!-- AREA THREE ABOUT -->
      <div class="third widget-area">
            <?php dynamic_sidebar('footer-widget-area-three'); ?>
    </div>

          <!-- AREA FOUR CONTACT -->
      <div class="fourth widget-area">
            <?php dynamic_sidebar('footer-widget-area-four'); ?>
    </div>
</section>

<!-- COPYRIGHT -->
 <section class="copyright">
    <p>Vinyl Record Store. All Rights Reserved.</p>
</section>

</footer>
</body>
</html>