<?php
get_header();

pageBanner(array(
  'title' => 'All Events',
  'subtitle' => 'See What is going on in our world.'
));
?>


<section class="post-page">
  <div class="container">
    <div class="events_page">
      <?php
      while (have_posts()) {
        the_post();
        get_template_part('template-parts/content', 'event');
      }
      ?>
    </div>
    <div class="pagination">
      <?php echo paginate_links(); ?>
    </div>
    <div class="page_info">
      <p>Looking for a recap of past events <a href="<?php echo site_url('/past-events'); ?>">Check out our past events archive</a></p>
    </div>
  </div>
</section>

<?php get_footer();
