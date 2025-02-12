<?php

get_header();

while (have_posts()) : the_post();


  pageBanner();


?>

  <div class="post-wrapper">
    <div class="container">
      <div class="page-content ">

        <div class="bradcumb">
          <a href="<?php echo site_url('/blog') ?>">
            <span class="icon icon-home"></span>
            Blog Home
          </a>
          <span>Posted By:
            <?php the_author_posts_link() ?>
            on
            <?php the_time('j. M, y') ?>
            in
            <?php echo get_the_category_list(", ") ?>
          </span>
        </div>

        <div class="generic-content">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>

<?php
endwhile;
get_footer();
