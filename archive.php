<?php

get_header();

$archiveTitle;
$category = get_the_category();

if (is_category()) {
  $archiveTitle = 'Post form ' . $category[0]->cat_name . ' category';
} else if (is_author()) {
  $archiveTitle = 'Posts by: <span class="text-capitalize">' . get_the_author() . '</span>';
} else {
  $archiveTitle = get_the_archive_title();
}

pageBanner(array(
  'title' => $archiveTitle,
  'subtitle' => get_the_archive_description()
));

?>

<section class="post-page">
  <div class="container">
    <div class="content-block">
      <?php get_template_part('template-parts/content', 'post'); ?>
    </div>
  </div>
</section>

<?php
get_footer();
