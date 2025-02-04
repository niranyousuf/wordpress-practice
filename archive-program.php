<?php

get_header();

pageBanner(array(
  'title' => 'All Program',
  'subtitle' => 'There is something for everyone. Have a look around.'
));

?>


<section class="post-page">
  <div class="container">
    <div class="content-block programs">
      <?php while (have_posts()) : the_post(); ?>
        <div class="program">
          <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
          <p>
            <?php
            $content = get_field('main_body_content');;
            $trimmed_content = wp_trim_words($content, 36, '...');
            echo $trimmed_content;
            ?>
          </p>
        </div>
      <?php endwhile; ?>

      <div class="pagination">
        <?php echo paginate_links(); ?>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
