<?php

get_header();

pageBanner(array(
  'title' => 'All Campuses',
  'subtitle' => 'We have several conveniently locatetd campuses.'
));

?>


<section class="post-page">
  <div class="container">
    <div class="content-block">
      <?php while (have_posts()) : the_post(); ?>
        <div class="single__post">
          <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
          <div class="post__content">
            <p><?php
                $content = get_the_content();
                $trimmed_content = wp_trim_words($content, 36, '...');
                echo $trimmed_content;
                ?></p>
          </div>

          <?php
          $mapLocation = get_field('map_location');
          ?>

        </div>
      <?php endwhile; ?>
      <!-- <?php  //while (have_posts()) : the_post(); 
            ?>
                <div class="col-md-12">

                    <div class="acf-map">
                        <?php
                        //  $mapLocation = get_field('map_location');
                        ?>
                        <div class="marker" data-lat="<?php // echo $mapLocation['lat'] 
                                                      ?>" data-lng="<?php // echo $mapLocation['lng']; 
                                                                      ?>">
                            <h3><a href="<?php // the_permalink(); 
                                          ?>"><?php // the_title(); 
                                                ?></a></h3>
                            <?php // echo $mapLocation['address']; 
                            ?>
                        </div>
                    </div>

                </div>
            <?php // endwhile; 
            ?> -->

      <div class="col-md-12">
        <div class="pagination max_container">
          <?php echo paginate_links(); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
