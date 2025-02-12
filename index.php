<?php

get_header();


pageBanner(array(
  'title' => 'Welcome to our blog',
  'subtitle' => 'Keep up with our latest news'
));


?>

<section class="posts-page">
  <div class="container">
    <div class="posts-wrapper">
      <div class="main-content">
        <?php get_template_part('template-parts/content', 'post'); ?>
      </div>

      <div class="sidebar-wrapper">
        <div class="sticky-top">
          <!-- Categories Widget -->
          <div class="sidebar">
            <h5 class="sidebar-header">Categories</h5>

            <ul class="sidebar-category">
              <?php
              // Get the categories with post count
              $categories = get_categories(array(
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => false,
              ));

              // Loop through each category
              foreach ($categories as $category) :
                // Get the category link and post count
                $category_link = get_category_link($category->term_id);
                $post_count = $category->count;

                if ($category->slug != 'uncategorized'): ?>
                  <li>
                    <a href="<?php echo esc_url($category_link); ?>">
                      <span class="icon icon-folder-open-empty"></span>
                      <?php echo $category->name; ?> <span class="badge"><?php echo $post_count;  ?></span></a>
                  </li>

              <?php endif;
              endforeach; ?>
            </ul>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
