<?php

get_header();

while (have_posts()) : the_post();

  pageBanner();

?>

  <div class="post-wrapper">
    <div class="container">
      <div class="post-content">

        <div class="bradcumb">
          <a href="<?php echo get_post_type_archive_link('event') ?>">
            <span class="icon icon-home"></span>
            <?php _e('Event home', 'cmt') ?>
          </a>
          <span><?php the_title(); ?></span>
        </div>

        <div class="generic-content">
          <?php the_content(); ?>
        </div>


        <?php $relatedPrograms = get_field('related_programs');
        if ($relatedPrograms) : ?>
          <div class="related">
            <h2><?php _e('Realated Programs', 'cmt') ?></h2>
            <?php foreach ($relatedPrograms as $program) : ?>
              <div class="related-program">

                <h2>
                  <a href="<?php echo get_the_permalink($program) ?>">
                    <?php echo get_the_title($program) ?>
                  </a>
                </h2>

                <p>
                  <?php
                  $content = get_the_content($program);
                  $trimmed_content = wp_trim_words($content, 30, '...');
                  echo $trimmed_content;
                  ?>
                </p>
              </div>
          <?php endforeach;
          endif; ?>

          </div>

      </div>
    </div>
  </div>

<?php

endwhile;

get_footer();
