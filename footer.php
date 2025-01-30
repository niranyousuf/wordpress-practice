<footer class="footer">
  <div class="container">
    <div class="footer_wrapper">
      <div class="product-info">
        <a href="<?php echo site_url() ?>" class="logo">
          <?php get_template_part('svgs/logo'); ?>
        </a>
        <p>Experience remarkable WordPress products with a new level of power, beauty, and human-centered designs. Think you know WordPress products? Think deeper!</p>
      </div>
      <div class="footer_menu">
        <div class="policies footer-links">
          <h3>Pages</h3>
          <ul class="links">
            <li><a href="<?php echo site_url('/about-us') ?>">About Us</a></li>
            <li><a href="<?php echo site_url('/privacy-policy') ?>">Privacy policy</a></li>
            <li><a href="<?php echo site_url('/privacy-policy') ?>">Refund policy</a></li>
            <li><a href="<?php echo site_url('/privacy-policy') ?>">Terms & conditions</a></li>
          </ul>
        </div>
        <div class="social-media footer-links">
          <h3>Social media</h3>
          <ul class="links">
            <li><a href="#"><span class="icon icon-facebook"></span> Facebook</a></li>
            <li><a href="#"><span class="icon icon-twitter"></span> Twitter</a></li>
            <li><a href="#"><span class="icon icon-linkedin"></span> Linkedin</a></li>
            <li><a href="#"><span class="icon icon-instagram"></span> Instagram</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="copyright">
      <p>&copy; <?php echo date('Y') ?> <a href="<?php echo site_url('/'); ?>"><?php bloginfo(); ?></a> | All Rights Reserved</p>
    </div>
  </div>
</footer>


<?php get_template_part('template-parts/content', 'search'); ?>

<?php wp_footer(); ?>
</body>

</html>